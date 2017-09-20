<?php

$app->post('/api/Dailymotion/listUserVideos', function ($request, $response) {

    $settings = $this->settings;
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['accessToken']);

    if(!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback']=='error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }

    $requiredParams = ['accessToken'=>'accessToken'];
    $optionalParams = ['context'=>'context','deviceFilter'=>'device_filter','familyFilter'=>'family_filter','localization'=>'localization','sslAssets'=>'ssl_assets','thumbnailRatio'=>'thumbnail_ratio','fields'=>'fields','channel'=>'channel','availability'=>'availability','createdAfter'=>'created_after','createdBefore'=>'created_before','live'=>'live','liveOffair'=>'live_offair','liveOnair'=>'live_onair','liveUpcoming'=>'live_upcoming','noLive'=>'no_live','nogenre'=>'nogenre','passwordProtected'=>'password_protected','private'=>'private','search'=>'search','sort'=>'sort','tags'=>'tags','unpublished'=>'unpublished','page'=>'page','limit'=>'limit'];
    $bodyParams = [
       'query' => ['limit','page','unpublished','tags','sort','search','private','password_protected','context','device_filter','family_filter','localization','ssl_assets','thumbnail_ratio','fields','availability','channel','created_after','created_before','live','live_offair','live_onair','live_upcoming','no_live','nogenre']
    ];

    $data = \Models\Params::createParams($requiredParams, $optionalParams, $post_data['args']);

    
    $data['fields'] = \Models\Params::toString($data['fields'], ','); 
    $data['created_after'] = \Models\Params::toFormat($data['created_after'], 'unixtime'); 
    $data['created_before'] = \Models\Params::toFormat($data['created_before'], 'unixtime'); 

    $client = $this->httpClient;     $data['userId'] = isset($data['userId']) ? $data['userId'] : 'me';
    $query_str = "https://api.dailymotion.com/videos";

    

    $requestParams = \Models\Params::createRequestBody($data, $bodyParams);
    $requestParams['headers'] = ["Authorization"=>"Bearer {$data['accessToken']}"];
     

    try {
        $resp = $client->get($query_str, $requestParams);
        $responseBody = $resp->getBody()->getContents();

        if(in_array($resp->getStatusCode(), ['200', '201', '202', '203', '204'])) {
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
            if(empty($result['contextWrites']['to'])) {
                $result['contextWrites']['to']['status_msg'] = "Api return no results";
            }
        } else {
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = 'API_ERROR';
            $result['contextWrites']['to']['status_msg'] = json_decode($responseBody);
        }

    } catch (\GuzzleHttp\Exception\ClientException $exception) {

        $responseBody = $exception->getResponse()->getBody()->getContents();
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;

    } catch (GuzzleHttp\Exception\ServerException $exception) {

        $responseBody = $exception->getResponse()->getBody()->getContents();
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;

    } catch (GuzzleHttp\Exception\ConnectException $exception) {
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'INTERNAL_PACKAGE_ERROR';
        $result['contextWrites']['to']['status_msg'] = 'Something went wrong inside the package.';

    }

    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});
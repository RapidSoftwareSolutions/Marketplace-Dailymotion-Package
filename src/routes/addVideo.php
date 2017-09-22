<?php

$app->post('/api/Dailymotion/addVideo', function ($request, $response) {

    $settings = $this->settings;
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['accessToken']);

    if(!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback']=='error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }

    $requiredParams = ['accessToken'=>'accessToken'];
    $optionalParams = ['fields'=>'fields','url'=>'url','allowEmbed'=>'allow_embed','allowedInPlaylists'=>'allowed_in_playlists','channel'=>'channel','country'=>'country','customClassification'=>'custom_classification','description'=>'description','endTime'=>'end_time','expiryDate'=>'expiry_date','expiryDateDeletion'=>'expiry_date_deletion','explicit'=>'explicit','genres'=>'genres','geoblocking'=>'geoblocking','geoloc'=>'geoloc','language'=>'language','mode'=>'mode','moods'=>'moods','password'=>'password','playerNextVideo'=>'player_next_video','private'=>'private','publishDate'=>'publish_date','published'=>'published','recordStatus'=>'record_status','rentalPrice'=>'rental_price','soundtrackPopularity'=>'soundtrack_popularity','startTime'=>'start_time','tags'=>'tags','thumbnailUrl'=>'thumbnail_url','title'=>'title'];
    $bodyParams = [
       'form_params' => ['title','thumbnail_url','tags','start_time','soundtrack_popularity','rental_price','record_status','published','publish_date','private','player_next_video','password','moods','mode','language','geoloc','geoblocking','genres','explicit','expiry_date_deletion','expiry_date','end_time','description','custom_classification','country','channel','allowed_in_playlists','allow_embed','url','fields']
    ];

    $data = \Models\Params::createParams($requiredParams, $optionalParams, $post_data['args']);

    
    $data['fields'] = \Models\Params::toString($data['fields'], ','); 
    $data['custom_classification'] = \Models\Params::toString($data['custom_classification'], ','); 
    $data['end_time'] = \Models\Params::toFormat($data['end_time'], 'unixtime'); 
    $data['expiry_date'] = \Models\Params::toFormat($data['expiry_date'], 'unixtime'); 
    $data['genres'] = \Models\Params::toString($data['genres'], ','); 
    $data['geoblocking'] = \Models\Params::toString($data['geoblocking'], ','); 
    $data['moods'] = \Models\Params::toString($data['moods'], ','); 
    $data['publish_date'] = \Models\Params::toFormat($data['publish_date'], 'unixtime'); 
    $data['start_time'] = \Models\Params::toFormat($data['start_time'], 'unixtime'); 

    $client = $this->httpClient;     $data['userId'] = isset($data['userId']) ? $data['userId'] : 'me';
    $query_str = "https://api.dailymotion.com/videos";



    $requestParams = \Models\Params::createRequestBody($data, $bodyParams);
    $requestParams['headers'] = ["Authorization"=>"Bearer {$data['accessToken']}"];


    try {
        $resp = $client->post($query_str, $requestParams);
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
<?php

$app->post('/api/Dailymotion/updateUser', function ($request, $response) {

    $settings = $this->settings;
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['accessToken','userId']);

    if(!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback']=='error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }

    $requiredParams = ['accessToken'=>'accessToken','userId'=>'userId'];
    $optionalParams = ['fields'=>'fields','address'=>'address','avatarUrl'=>'avatar_url','birthday'=>'birthday','city'=>'city','country'=>'country','coverUrl'=>'cover_url','description'=>'description','email'=>'email','facebookUrl'=>'facebook_url','fullname'=>'fullname','firstName'=>'first_name','gender'=>'gender','googleplusUrl'=>'googleplus_url','instagramUrl'=>'instagram_url','language'=>'language','lastName'=>'last_name','linkedinUrl'=>'linkedin_url','partner'=>'partner','pinterestUrl'=>'pinterest_url','screenname'=>'screenname','twitterUrl'=>'twitter_url','username'=>'username','verified'=>'verified','videostar'=>'videostar','websiteUrl'=>'website_url'];
    $bodyParams = [
       'form_params' => ['website_url','videostar','verified','username','twitter_url','screenname','pinterest_url','partner','linkedin_url','last_name','language','instagram_url','googleplus_url','gender','fullname','first_name','facebook_url','email','description','cover_url','country','fields','address','avatar_url','birthday','city']
    ];

    $data = \Models\Params::createParams($requiredParams, $optionalParams, $post_data['args']);

    
    $data['fields'] = \Models\Params::toString($data['fields'], ','); 
    $data['birthday'] = \Models\Params::toFormat($data['birthday'], 'Y-m-d'); 

    $client = $this->httpClient;     $data['userId'] = isset($data['userId']) ? $data['userId'] : 'me';
    $query_str = "https://api.dailymotion.com/user/{$data['userId']}";

    

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
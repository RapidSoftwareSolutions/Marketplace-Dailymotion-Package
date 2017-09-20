[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/Dailymotion/functions?utm_source=RapidAPIGitHub_DailymotionFunctions&utm_medium=button&utm_content=RapidAPI_GitHub)

# Dailymotion Package
Dailymotion is one of the biggest video platforms in the world, and as such, we offer video storage and viewing capability to our users.
* Domain: [Dailymotion](http://dailymotion.com/)
* Credentials: apiKey, apiSecret

## How to get credentials: 
0. Browse to [Dailymotion](www.dailymotion.com)
1. Register or log in
2. Create you application to get apiKey and apiSecret at [ApiKeys page](http://www.dailymotion.com/settings/developer)



## Custom datatypes: 
 |Datatype|Description|Example
 |--------|-----------|----------
 |Datepicker|String which includes date and time|```2016-05-28 00:00:00```
 |Map|String which includes latitude and longitude coma separated|```50.37, 26.56```
 |List|Simple array|```["123", "sample"]``` 
 |Select|String with predefined values|```sample```
 |Array|Array of objects|```[{"Second name":"123","Age":"12","Photo":"sdf","Draft":"sdfsdf"},{"name":"adi","Second name":"bla","Age":"4","Photo":"asfserwe","Draft":"sdfsdf"}] ```
 

## Dailymotion.getAccessToken
Get access token

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Your API key
| apiSecret  | credentials| Your API secret
| redirectUrl| String     | Your redirect url
| code       | String     | Code provided by dailymotion

## Dailymotion.refreshAccessToken
Refresh access token

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Your API key
| apiSecret   | credentials| Your API secret
| refreshToken| String     | Refresh token

## Dailymotion.revokeAccessToken
Revoke access token

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token

## Dailymotion.listVideos
Retrieve a list of videos

| Field            | Type      | Description
|------------------|-----------|----------
| accessToken      | String    | Access token token
| context          | String    | Some resources of the API require that you provide contextual information along with your request in order to return relevant data. This is especially useful when the API cannot retrieve or guess this additional information by itself. Contextual information should only be provided when expressly needed by the resource you are trying to query. 
| deviceFilter     | Select    | By default, the device is auto-detected based on the user-agent of the API consumer. Valid values are `detect`, `web`, `mobile` and `iptv`. Changing this value will filter out content not allowed on the defined device.
| familyFilter     | Select    | By default, the family filter is turned **on**. Setting this parameter to `false` will stop filtering-out explit content from searches and global contexts. You should always check the result's `explicit` field when applicable as some contexts may still return those contents. You should also flag them in your UI to warn the user about the nature of the content.
| localization     | String    | This will affect results language and content selection. Note that changing the localization won't give access to geoblocked content of the corresponding location. The IP address of the API consumer is always used for this kind of restriction. You can use a standard locale like `fr_FR`, `en_US` (or simply `en`, `it`) but you can also provide `detect` to tell the API to detect the most probable locale based on the consumer's location.
| sslAssets        | Select    | **Get secured HTTPS URLs for all assets** (URLs, images, videos, etc.). By default, this option is turned **off**.
| thumbnailRatio   | Select    | **Change the size ratio for all video thumbnails.** By default, this option is set to `original`. Accepted values are `original`, `widescreen` and `square`.
| fields           | List      | List of fields to return
| 360Degree        | Select    | Limit the result set to 360 videos.
| availability     | Select    | Limit the result set to available videos.
| channel          | String    | Limit the result set to this channel.
| country          | String    | Limit the result set to this country (declarative).
| createdAfter     | DatePicker| Limit the result set to videos created after this date and time.
| createdBefore    | DatePicker| Limit the result set to videos created before this date and time.
| excludeIds       | List      | List of video ids to exclude from the result set.
| featured         | Select    | Limit the result set to featured videos.
| hasGame          | Select    | Limit the result set to videos related to a video-game.
| hd               | Select    | Limit the result set to high definition videos (vertical resolution greater than or equal to 720p).
| ids              | List      | Limit the result set to this list of video identifiers (works only with xids).
| inHistory        | Select    | Limit the result set to videos in your watch history.
| languages        | List      | Limit the result set to this list of languages. Language is declarative and corresponds to the user-declared spoken language of the video. If you wish to retrieve content currated for a specific locale, use the [`localization`]
| list             | Select    | Limit the result set to this video list.
| live             | Select    | Limit the result set to live streaming videos.
| liveOffair       | Select    | Limit the result set to off-air live streaming videos.
| liveOnair        | Select    | Limit the result set to on-air live streaming videos.
| liveUpcoming     | Select    | Limit the result set to upcoming live streaming videos.
| longerThan       | Number    | Limit the results to videos with a duration longer than or equal to the specified number of minutes.
| noLive           | Select    | Limit the result set to non-live streaming videos.
| noPremium        | Select    | Limit the result set to free video content.
| nogenre          | String    | Limit the result set by excluding this genre.
| owners           | List      | Limit the result set to this list of user identifiers or logins.
| partner          | Select    | Limit the result set to partner videos.
| passwordProtected| Select    | Limit the result set to password protected partner videos.
| premium          | Select    | Limit the result set to premium SVOD and TVOD video content.
| private          | Select    | Limit the result set to private videos.
| search           | String    | Limit the result set to this full text search.
| shorterThan      | Number    | Limit the results to videos with a duration shorter than or equal to the specified number of minutes.
| sort             | Select    | Change the default result set ordering.
| tags             | String    | Limit the result set to this full text search of video tags.
| ugc              | Select    | Limit the result set to user generated video content (no partner content).
| unpublished      | Select    | Limit the result set to unpublished videos.
| verified         | Select    | Limit the result set to verified partner videos.
| page             | Number    | The page number to load
| limit            | Number    | Maximum number of items to return

## Dailymotion.getSingleVideo
Retrieve a video with its identifier

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| videoId    | String| Unique object identifier (unique among all videos)
| fields     | List  | List of fields to return

## Dailymotion.addVideo
Create a video

| Field               | Type      | Description
|---------------------|-----------|----------
| accessToken         | String    | Access token token
| url                 | String    | URL of this video on Dailymotion. Writing this parameter defines where to download the video source.
| fields              | List      | List of fields to return
| allowEmbed          | Select    | True if this video can be embedded outside of Dailymotion.
| allowedInPlaylists  | Select    | True if this video can be added to playlists.
| channel             | String    | Limit the result set to this channel.
| country             | String    | Limit the result set to this country (declarative).
| customClassification| List      | List of customizable values (maximum of 3 values)
| description         | String    | Comprehensive description of this video. Maximumm length is set to 3000 (5000 for partners).
| endTime             | DatePicker| End date and time of this live stream.
| expiryDate          | DatePicker| Date and time after which this video will be made private. 
| expiryDateDeletion  | Select    | By default, videos are deleted (after a grace period) when their [`expiry_date`](#video-expiry_date-field) is reached. Set this to `false` to disable this behavior.
| explicit            | Select    | True if this video is explicit.
| genres              | List      | List of genres of a given video.
| geoblocking         | List      | List of countries where this video is or isn't accessible. A list of country codes (ISO 3166-1 alpha-2) starting with the `deny` or `allow` (default) keyword to define if this is a black or a whitelist, e.g.: both `["allow", "fr", "us", "it"]` and `["fr", "us", "it"]` will allow this video to be accessed in France, US and Italy and deny all other countries. On the other hand, `["deny", "us", "fr"]` will deny access to this video in the US and France and allow it everywhere else. An empty list `[]` or simply `["allow"]` (the default) will revert the behavior to _allow from everywhere_. To set geoblocking on your videos, you have to be a Dailymotion partner.
| geoloc              | String    | Geolocalization for this video. Result is an array with the longitude and latitude using point notation.
| language            | Select    |  Language of this video. This value is declarative and corresponds to the user-declared spoken language of the video.
| mode                | Select    | Stream mode.
| moods               | List      | List of moods of a given video.
| password            | String    | If a video is protected by a password, this field contains the password. When setting a value on this field, the video visibility changes to "password protected". Setting it to NULL removes the password protection: the visibility is changed to "public".
| playerNextVideo     | String    | A unique video picked by the owner, displayed when video's playback ends.
| private             | Select    | Limit the result set to private videos.
| publishDate         | DatePicker| Date and time after which this video will be made publicly available
| published           | Select    | True if this video is published (may still be waiting for encoding, see the `status` field for more information).
| recordStatus        | Select    | Current state of the recording process of this video. - starting: Recording video is going to start - started: Recording video is in progress - stopping: Recording video is going to stop - stopped: Recording video is stopped
| rentalPrice         | String    |  Price of renting this video as a float in the current currency or `null` if this video is not behind a paywall. 
| soundtrackPopularity| String    | Soundtrack popularity.
| startTime           | DatePicker| Start date and time of this live stream.
| tags                | String    | Limit the result set to this full text search of video tags.
| thumbnailUrl        | String    | URL of this video's raw thumbnail (full size respecting ratio). Some users have the permission to change this value by providing an URL to a custom thumbnail. Note: for live streams, the thumbnail is automatically generated every 5 mn by default; it is not possible anymore to manually refresh the preview.
| title               | String    | Title of this video.

## Dailymotion.updateVideo
Edit an existing video

| Field               | Type      | Description
|---------------------|-----------|----------
| accessToken         | String    | Access token token
| videoId             | String    | Unique object identifier (unique among all videos)
| url                 | String    | URL of this video on Dailymotion. Writing this parameter defines where to download the video source.
| fields              | List      | List of fields to return
| allowEmbed          | Select    | True if this video can be embedded outside of Dailymotion.
| allowedInPlaylists  | Select    | True if this video can be added to playlists.
| channel             | String    | Limit the result set to this channel.
| country             | String    | Limit the result set to this country (declarative).
| customClassification| List      | List of customizable values (maximum of 3 values)
| description         | String    | Comprehensive description of this video. Maximumm length is set to 3000 (5000 for partners).
| endTime             | DatePicker| End date and time of this live stream.
| expiryDate          | DatePicker| Date and time after which this video will be made private. 
| expiryDateDeletion  | Select    | By default, videos are deleted (after a grace period) when their [`expiry_date`](#video-expiry_date-field) is reached. Set this to `false` to disable this behavior.
| explicit            | Select    | True if this video is explicit.
| genres              | List      | List of genres of a given video.
| geoblocking         | List      | List of countries where this video is or isn't accessible. A list of country codes (ISO 3166-1 alpha-2) starting with the `deny` or `allow` (default) keyword to define if this is a black or a whitelist, e.g.: both `["allow", "fr", "us", "it"]` and `["fr", "us", "it"]` will allow this video to be accessed in France, US and Italy and deny all other countries. On the other hand, `["deny", "us", "fr"]` will deny access to this video in the US and France and allow it everywhere else. An empty list `[]` or simply `["allow"]` (the default) will revert the behavior to _allow from everywhere_. To set geoblocking on your videos, you have to be a Dailymotion partner.
| geoloc              | String    | Geolocalization for this video. Result is an array with the longitude and latitude using point notation.
| language            | Select    |  Language of this video. This value is declarative and corresponds to the user-declared spoken language of the video.
| mode                | Select    | Stream mode.
| moods               | List      | List of moods of a given video.
| password            | String    | If a video is protected by a password, this field contains the password. When setting a value on this field, the video visibility changes to "password protected". Setting it to NULL removes the password protection: the visibility is changed to "public".
| playerNextVideo     | String    | A unique video picked by the owner, displayed when video's playback ends.
| private             | Select    | Limit the result set to private videos.
| publishDate         | DatePicker| Date and time after which this video will be made publicly available
| published           | Select    | True if this video is published (may still be waiting for encoding, see the `status` field for more information).
| recordStatus        | Select    | Current state of the recording process of this video. - starting: Recording video is going to start - started: Recording video is in progress - stopping: Recording video is going to stop - stopped: Recording video is stopped
| rentalPrice         | String    |  Price of renting this video as a float in the current currency or `null` if this video is not behind a paywall. 
| soundtrackPopularity| String    | Soundtrack popularity.
| startTime           | DatePicker| Start date and time of this live stream.
| tags                | String    | Limit the result set to this full text search of video tags.
| thumbnailUrl        | String    | URL of this video's raw thumbnail (full size respecting ratio). Some users have the permission to change this value by providing an URL to a custom thumbnail. Note: for live streams, the thumbnail is automatically generated every 5 mn by default; it is not possible anymore to manually refresh the preview.
| title               | String    | Title of this video.

## Dailymotion.deleteSingleVideo
Delete an existing video

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| videoId    | String| Unique object identifier (unique among all videos)

## Dailymotion.listRelatedVideos
List of videos related to this video.

| Field         | Type  | Description
|---------------|-------|----------
| accessToken   | String| Access token token
| videoId       | String| Unique object identifier (unique among all videos)
| context       | String| Some resources of the API require that you provide contextual information along with your request in order to return relevant data. This is especially useful when the API cannot retrieve or guess this additional information by itself. Contextual information should only be provided when expressly needed by the resource you are trying to query. 
| deviceFilter  | Select| By default, the device is auto-detected based on the user-agent of the API consumer. Valid values are `detect`, `web`, `mobile` and `iptv`. Changing this value will filter out content not allowed on the defined device.
| familyFilter  | Select| By default, the family filter is turned **on**. Setting this parameter to `false` will stop filtering-out explit content from searches and global contexts. You should always check the result's `explicit` field when applicable as some contexts may still return those contents. You should also flag them in your UI to warn the user about the nature of the content.
| localization  | String| This will affect results language and content selection. Note that changing the localization won't give access to geoblocked content of the corresponding location. The IP address of the API consumer is always used for this kind of restriction. You can use a standard locale like `fr_FR`, `en_US` (or simply `en`, `it`) but you can also provide `detect` to tell the API to detect the most probable locale based on the consumer's location.
| sslAssets     | Select| **Get secured HTTPS URLs for all assets** (URLs, images, videos, etc.). By default, this option is turned **off**.
| thumbnailRatio| Select| **Change the size ratio for all video thumbnails.** By default, this option is set to `original`. Accepted values are `original`, `widescreen` and `square`.
| fields        | List  | List of fields to return
| sort          | Select| Change the default result set ordering.
| page          | Number| The page number to load
| limit         | Number| Maximum number of items to return

## Dailymotion.listFavoritesVideos
List of videos favorited by this user

| Field         | Type  | Description
|---------------|-------|----------
| accessToken   | String| Access token token
| userId        | String| Unique object identifier (unique among all users, default me)
| context       | String| Some resources of the API require that you provide contextual information along with your request in order to return relevant data. This is especially useful when the API cannot retrieve or guess this additional information by itself. Contextual information should only be provided when expressly needed by the resource you are trying to query. 
| deviceFilter  | Select| By default, the device is auto-detected based on the user-agent of the API consumer. Valid values are `detect`, `web`, `mobile` and `iptv`. Changing this value will filter out content not allowed on the defined device.
| familyFilter  | Select| By default, the family filter is turned **on**. Setting this parameter to `false` will stop filtering-out explit content from searches and global contexts. You should always check the result's `explicit` field when applicable as some contexts may still return those contents. You should also flag them in your UI to warn the user about the nature of the content.
| localization  | String| This will affect results language and content selection. Note that changing the localization won't give access to geoblocked content of the corresponding location. The IP address of the API consumer is always used for this kind of restriction. You can use a standard locale like `fr_FR`, `en_US` (or simply `en`, `it`) but you can also provide `detect` to tell the API to detect the most probable locale based on the consumer's location.
| sslAssets     | Select| **Get secured HTTPS URLs for all assets** (URLs, images, videos, etc.). By default, this option is turned **off**.
| thumbnailRatio| Select| **Change the size ratio for all video thumbnails.** By default, this option is set to `original`. Accepted values are `original`, `widescreen` and `square`.
| fields        | List  | List of fields to return
| sort          | Select| Change the default result set ordering.
| page          | Number| The page number to load
| limit         | Number| Maximum number of items to return

## Dailymotion.checkFavoriteVideo
Check if a given video is favorited

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| userId     | String| Unique object identifier (unique among all users, default me)
| videoId    | String| Unique object identifier (unique among all videos)
| fields     | List  | List of fields to return

## Dailymotion.favoriteVideo
Favorite given video

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| videoId    | String| Unique object identifier (unique among all videos)

## Dailymotion.unfavoriteVideo
Unfavorite given video

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| videoId    | String| Unique object identifier (unique among all videos)

## Dailymotion.listFeaturedVideos
List of videos featured by this user.

| Field         | Type  | Description
|---------------|-------|----------
| accessToken   | String| Access token token
| userId        | String| Unique object identifier (unique among all users, default me)
| context       | String| Some resources of the API require that you provide contextual information along with your request in order to return relevant data. This is especially useful when the API cannot retrieve or guess this additional information by itself. Contextual information should only be provided when expressly needed by the resource you are trying to query. 
| deviceFilter  | Select| By default, the device is auto-detected based on the user-agent of the API consumer. Valid values are `detect`, `web`, `mobile` and `iptv`. Changing this value will filter out content not allowed on the defined device.
| familyFilter  | Select| By default, the family filter is turned **on**. Setting this parameter to `false` will stop filtering-out explit content from searches and global contexts. You should always check the result's `explicit` field when applicable as some contexts may still return those contents. You should also flag them in your UI to warn the user about the nature of the content.
| localization  | String| This will affect results language and content selection. Note that changing the localization won't give access to geoblocked content of the corresponding location. The IP address of the API consumer is always used for this kind of restriction. You can use a standard locale like `fr_FR`, `en_US` (or simply `en`, `it`) but you can also provide `detect` to tell the API to detect the most probable locale based on the consumer's location.
| sslAssets     | Select| **Get secured HTTPS URLs for all assets** (URLs, images, videos, etc.). By default, this option is turned **off**.
| thumbnailRatio| Select| **Change the size ratio for all video thumbnails.** By default, this option is set to `original`. Accepted values are `original`, `widescreen` and `square`.
| fields        | List  | List of fields to return
| sort          | Select| Change the default result set ordering.
| page          | Number| The page number to load
| limit         | Number| Maximum number of items to return

## Dailymotion.checkFeaturedVideo
Check if a given video is featured

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| userId     | String| Unique object identifier (unique among all users, default me)
| videoId    | String| Unique object identifier (unique among all videos)
| fields     | List  | List of fields to return

## Dailymotion.featureVideo
Feature given video

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| videoId    | String| Unique object identifier (unique among all videos)

## Dailymotion.unfeatureVideo
Unfeature given video

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| videoId    | String| Unique object identifier (unique among all videos)

## Dailymotion.listRecentlyWatchedVideos
List of recently watched videos

| Field         | Type  | Description
|---------------|-------|----------
| accessToken   | String| Access token token
| userId        | String| Unique object identifier (unique among all users, default me)
| context       | String| Some resources of the API require that you provide contextual information along with your request in order to return relevant data. This is especially useful when the API cannot retrieve or guess this additional information by itself. Contextual information should only be provided when expressly needed by the resource you are trying to query. 
| deviceFilter  | Select| By default, the device is auto-detected based on the user-agent of the API consumer. Valid values are `detect`, `web`, `mobile` and `iptv`. Changing this value will filter out content not allowed on the defined device.
| familyFilter  | Select| By default, the family filter is turned **on**. Setting this parameter to `false` will stop filtering-out explit content from searches and global contexts. You should always check the result's `explicit` field when applicable as some contexts may still return those contents. You should also flag them in your UI to warn the user about the nature of the content.
| localization  | String| This will affect results language and content selection. Note that changing the localization won't give access to geoblocked content of the corresponding location. The IP address of the API consumer is always used for this kind of restriction. You can use a standard locale like `fr_FR`, `en_US` (or simply `en`, `it`) but you can also provide `detect` to tell the API to detect the most probable locale based on the consumer's location.
| sslAssets     | Select| **Get secured HTTPS URLs for all assets** (URLs, images, videos, etc.). By default, this option is turned **off**.
| thumbnailRatio| Select| **Change the size ratio for all video thumbnails.** By default, this option is set to `original`. Accepted values are `original`, `widescreen` and `square`.
| fields        | List  | List of fields to return
| page          | Number| The page number to load
| limit         | Number| Maximum number of items to return

## Dailymotion.checkRecentlyWatchedVideo
Check if a given video is recently watched

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| userId     | String| Unique object identifier (unique among all users, default me)
| videoId    | String| Unique object identifier (unique among all videos)
| fields     | List  | List of fields to return

## Dailymotion.addVideoToRecentlyWathced
Add to recently watched given video

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| videoId    | String| Unique object identifier (unique among all videos)

## Dailymotion.removVideoFromRecentlyWathced
Remove from recently watched given video

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| videoId    | String| Unique object identifier (unique among all videos)

## Dailymotion.listLikedVideos
List of videos liked by this user

| Field         | Type  | Description
|---------------|-------|----------
| accessToken   | String| Access token token
| userId        | String| Unique object identifier (unique among all users, default me)
| context       | String| Some resources of the API require that you provide contextual information along with your request in order to return relevant data. This is especially useful when the API cannot retrieve or guess this additional information by itself. Contextual information should only be provided when expressly needed by the resource you are trying to query. 
| deviceFilter  | Select| By default, the device is auto-detected based on the user-agent of the API consumer. Valid values are `detect`, `web`, `mobile` and `iptv`. Changing this value will filter out content not allowed on the defined device.
| familyFilter  | Select| By default, the family filter is turned **on**. Setting this parameter to `false` will stop filtering-out explit content from searches and global contexts. You should always check the result's `explicit` field when applicable as some contexts may still return those contents. You should also flag them in your UI to warn the user about the nature of the content.
| localization  | String| This will affect results language and content selection. Note that changing the localization won't give access to geoblocked content of the corresponding location. The IP address of the API consumer is always used for this kind of restriction. You can use a standard locale like `fr_FR`, `en_US` (or simply `en`, `it`) but you can also provide `detect` to tell the API to detect the most probable locale based on the consumer's location.
| sslAssets     | Select| **Get secured HTTPS URLs for all assets** (URLs, images, videos, etc.). By default, this option is turned **off**.
| thumbnailRatio| Select| **Change the size ratio for all video thumbnails.** By default, this option is set to `original`. Accepted values are `original`, `widescreen` and `square`.
| fields        | List  | List of fields to return
| sort          | Select| Change the default result set ordering.
| page          | Number| The page number to load
| limit         | Number| Maximum number of items to return

## Dailymotion.checkLikedVideo
Check if a given video is liked

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| userId     | String| Unique object identifier (unique among all users, default me)
| videoId    | String| Unique object identifier (unique among all videos)
| fields     | List  | List of fields to return

## Dailymotion.likeVideo
Like given video

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| videoId    | String| Unique object identifier (unique among all videos)

## Dailymotion.unlikeVideo
Unlike given video

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| videoId    | String| Unique object identifier (unique among all videos)

## Dailymotion.listSubscriptionsVideos
List of videos from the channels the user follow.

| Field         | Type  | Description
|---------------|-------|----------
| accessToken   | String| Access token token
| userId        | String| Unique object identifier (unique among all users, default me)
| context       | String| Some resources of the API require that you provide contextual information along with your request in order to return relevant data. This is especially useful when the API cannot retrieve or guess this additional information by itself. Contextual information should only be provided when expressly needed by the resource you are trying to query. 
| deviceFilter  | Select| By default, the device is auto-detected based on the user-agent of the API consumer. Valid values are `detect`, `web`, `mobile` and `iptv`. Changing this value will filter out content not allowed on the defined device.
| familyFilter  | Select| By default, the family filter is turned **on**. Setting this parameter to `false` will stop filtering-out explit content from searches and global contexts. You should always check the result's `explicit` field when applicable as some contexts may still return those contents. You should also flag them in your UI to warn the user about the nature of the content.
| localization  | String| This will affect results language and content selection. Note that changing the localization won't give access to geoblocked content of the corresponding location. The IP address of the API consumer is always used for this kind of restriction. You can use a standard locale like `fr_FR`, `en_US` (or simply `en`, `it`) but you can also provide `detect` to tell the API to detect the most probable locale based on the consumer's location.
| sslAssets     | Select| **Get secured HTTPS URLs for all assets** (URLs, images, videos, etc.). By default, this option is turned **off**.
| thumbnailRatio| Select| **Change the size ratio for all video thumbnails.** By default, this option is set to `original`. Accepted values are `original`, `widescreen` and `square`.
| fields        | List  | List of fields to return
| sort          | Select| Change the default result set ordering.
| page          | Number| The page number to load
| limit         | Number| Maximum number of items to return
| channel       | String| Limit the result set to this channel.
| search        | String| Limit the result set to this full text search.
| tags          | String| Limit the result set to this full text search of video tags.

## Dailymotion.listUserVideos
List of videos uploaded by this user.

| Field            | Type      | Description
|------------------|-----------|----------
| accessToken      | String    | Access token token
| context          | String    | Some resources of the API require that you provide contextual information along with your request in order to return relevant data. This is especially useful when the API cannot retrieve or guess this additional information by itself. Contextual information should only be provided when expressly needed by the resource you are trying to query. 
| deviceFilter     | Select    | By default, the device is auto-detected based on the user-agent of the API consumer. Valid values are `detect`, `web`, `mobile` and `iptv`. Changing this value will filter out content not allowed on the defined device.
| familyFilter     | Select    | By default, the family filter is turned **on**. Setting this parameter to `false` will stop filtering-out explit content from searches and global contexts. You should always check the result's `explicit` field when applicable as some contexts may still return those contents. You should also flag them in your UI to warn the user about the nature of the content.
| localization     | String    | This will affect results language and content selection. Note that changing the localization won't give access to geoblocked content of the corresponding location. The IP address of the API consumer is always used for this kind of restriction. You can use a standard locale like `fr_FR`, `en_US` (or simply `en`, `it`) but you can also provide `detect` to tell the API to detect the most probable locale based on the consumer's location.
| sslAssets        | Select    | **Get secured HTTPS URLs for all assets** (URLs, images, videos, etc.). By default, this option is turned **off**.
| thumbnailRatio   | Select    | **Change the size ratio for all video thumbnails.** By default, this option is set to `original`. Accepted values are `original`, `widescreen` and `square`.
| fields           | List      | List of fields to return
| channel          | String    | Limit the result set to this channel.
| availability     | Select    | Limit the result set to available videos.
| createdAfter     | DatePicker| Limit the result set to videos created after this date and time.
| createdBefore    | DatePicker| Limit the result set to videos created before this date and time.
| live             | Select    | Limit the result set to live streaming videos.
| liveOffair       | Select    | Limit the result set to off-air live streaming videos.
| liveOnair        | Select    | Limit the result set to on-air live streaming videos.
| liveUpcoming     | Select    | Limit the result set to upcoming live streaming videos.
| noLive           | Select    | Limit the result set to non-live streaming videos.
| nogenre          | String    | Limit the result set by excluding this genre.
| passwordProtected| Select    | Limit the result set to password protected partner videos.
| private          | Select    | Limit the result set to private videos.
| search           | String    | Limit the result set to this full text search.
| sort             | Select    | Change the default result set ordering.
| tags             | String    | Limit the result set to this full text search of video tags.
| unpublished      | Select    | Limit the result set to unpublished videos.
| page             | Number    | The page number to load
| limit            | Number    | Maximum number of items to return

## Dailymotion.listWatchlaterVideos
List of watch later videos.

| Field         | Type  | Description
|---------------|-------|----------
| accessToken   | String| Access token token
| userId        | String| Unique object identifier (unique among all users, default me)
| context       | String| Some resources of the API require that you provide contextual information along with your request in order to return relevant data. This is especially useful when the API cannot retrieve or guess this additional information by itself. Contextual information should only be provided when expressly needed by the resource you are trying to query. 
| deviceFilter  | Select| By default, the device is auto-detected based on the user-agent of the API consumer. Valid values are `detect`, `web`, `mobile` and `iptv`. Changing this value will filter out content not allowed on the defined device.
| familyFilter  | Select| By default, the family filter is turned **on**. Setting this parameter to `false` will stop filtering-out explit content from searches and global contexts. You should always check the result's `explicit` field when applicable as some contexts may still return those contents. You should also flag them in your UI to warn the user about the nature of the content.
| localization  | String| This will affect results language and content selection. Note that changing the localization won't give access to geoblocked content of the corresponding location. The IP address of the API consumer is always used for this kind of restriction. You can use a standard locale like `fr_FR`, `en_US` (or simply `en`, `it`) but you can also provide `detect` to tell the API to detect the most probable locale based on the consumer's location.
| sslAssets     | Select| **Get secured HTTPS URLs for all assets** (URLs, images, videos, etc.). By default, this option is turned **off**.
| thumbnailRatio| Select| **Change the size ratio for all video thumbnails.** By default, this option is set to `original`. Accepted values are `original`, `widescreen` and `square`.
| fields        | List  | List of fields to return
| sort          | Select| Change the default result set ordering.
| page          | Number| The page number to load
| limit         | Number| Maximum number of items to return

## Dailymotion.checkWatchlaterVideo
Check if a given video is added to watchlater

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| userId     | String| Unique object identifier (unique among all users, default me)
| videoId    | String| Unique object identifier (unique among all videos)
| fields     | List  | List of fields to return

## Dailymotion.addVideoToWatchlater
Add to watchlater given video

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| videoId    | String| Unique object identifier (unique among all videos)

## Dailymotion.removeVideoFromWatchlater
Remove from watchlater given video

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| videoId    | String| Unique object identifier (unique among all videos)

## Dailymotion.listVideoSubtitles
Retrieve the list of connected subtitle

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| videoId    | String| Unique object identifier (unique among all videos)
| language   | Select| Limit the result set to subtitles of this language.
| fields     | List  | List of fields to return
| page       | Number| The page number to load
| limit      | Number| Maximum number of items to return

## Dailymotion.addVideoSubtitles
Add subtitles to video

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| videoId    | String| Unique object identifier (unique among all videos)
| url        | String| URL pointing to the subtitle data in on of the valid formats.
| language   | Select| Limit the result set to subtitles of this language.
| format     | Select| Data format SRT only is supported, if you have an other format please convert it to SRT.

## Dailymotion.deleteVideoSubtitles
Delete subtitles from video

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| videoId    | String| Unique object identifier (unique among all videos)
| subtitlesId| String| Unique object identifier (unique among all subtitles)

## Dailymotion.listUsers
Retrieve a list of users

| Field                | Type  | Description
|----------------------|-------|----------
| accessToken          | String| Access token token
| fields               | List  | List of fields to return
| country              | String| Country of residence of this user.
| language             | Select| Limit the result set to users using this language.
| ids                  | List  | Limit the result set to this list of user identifiers.
| list                 | Select| Limit the result set to this user list.
| mostpopular          | Select| Limit the result set to the most popular users.
| parent               | String| Limit the result set to children of this user.
| partner              | Select| Limit the result set to partner users.
| recommended          | Select| Limit the result set to recommended users.
| recommendedForChannel| String| Limit the result set to this channel's top users.
| search               | String| Limit the result set to this full text search.
| sort                 | Select| Change the default result set ordering.
| usernames            | List  | Limit the results set to users with a list of usernames
| verified             | Select| Limit the result set to verified partner users.
| page                 | Number| The page number to load
| limit                | Number| Maximum number of items to return

## Dailymotion.getSingleUser
Retrieve a user with its identifier

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| userId     | String| Unique object identifier (unique among all users)
| fields     | List  | List of fields to return

## Dailymotion.updateUser
Edit an existing user

| Field        | Type      | Description
|--------------|-----------|----------
| accessToken  | String    | Access token token
| userId       | String    | Unique object identifier (unique among all users)
| fields       | List      | List of fields to return
| address      | String    | Postal address of this user.
| avatarUrl    | String    | URL of an image to change this user's avatar.
| birthday     | DatePicker| Birthday date of this user.
| city         | String    | City of residence of this user.
| country      | String    | Country of residence of this user.
| coverUrl     | String    | URL of this user's cover image (original size).
| description  | String    | Comprehensive description of this user.
| email        | String    | Email address of this user.
| facebookUrl  | String    | Facebook profile URL of this user.
| fullname     | String    | Full name of this user.
| firstName    | String    | First name of this user.
| gender       | Select    | Gender of this user.
| googleplusUrl| String    | Googleplus profile URL of this user.
| instagramUrl | String    | Instagram profile URL of this user.
| language     | Select    | Limit the result set to users using this language.
| lastName     | String    | Last name of this user.
| linkedinUrl  | String    | LinkedIn profile URL of this user.
| partner      | Select    | Limit the result set to partner users.
| pinterestUrl | String    | Pinterest profile URL of this user.
| screenname   | String    | Returns this user's full name or login depending on the user's preferences.
| twitterUrl   | String    | Twitter profile URL of this user.
| username     | String    | User account credentials login.
| verified     | Select    | Limit the result set to verified partner users.
| videostar    | String    | Showcased video of this user.
| websiteUrl   | String    | Personal website URL of this user.

## Dailymotion.listUserChildren
List of this user's children.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| userId     | String| Unique object identifier (unique among all users)
| fields     | List  | List of fields to return
| language   | Select| Limit the result set to users using this language.
| search     | String| Limit the result set to this full text search.
| sort       | Select| Change the default result set ordering.
| page       | Number| The page number to load
| limit      | Number| Maximum number of items to return

## Dailymotion.checkUserChild
Check if a given user is child

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| userId     | String| Unique object identifier (unique among all users)
| childId    | String| Unique object identifier (unique among all children)
| fields     | List  | List of fields to return

## Dailymotion.addChild
Add a child to user with its identifier

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| userId     | String| Unique object identifier (unique among all users)
| childId    | String| Unique object identifier (unique among all children)

## Dailymotion.deleteChild
Delete a child from user with its identifier

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| userId     | String| Unique object identifier (unique among all users)
| childId    | String| Unique object identifier (unique among all children)

## Dailymotion.listUserFollowers
List of this user's followers.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| userId     | String| Unique object identifier (unique among all users)
| fields     | List  | List of fields to return
| language   | Select| Limit the result set to users using this language.
| sort       | Select| Change the default result set ordering.
| page       | Number| The page number to load
| limit      | Number| Maximum number of items to return

## Dailymotion.listUserFollowing
List of users followed by this user.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| userId     | String| Unique object identifier (unique among all users)
| fields     | List  | List of fields to return
| language   | Select| Limit the result set to users using this language.
| sort       | Select| Change the default result set ordering.
| page       | Number| The page number to load
| limit      | Number| Maximum number of items to return

## Dailymotion.checkFollowedUser
Check if a given user is followed

| Field       | Type  | Description
|-------------|-------|----------
| accessToken | String| Access token token
| userId      | String| Unique object identifier (unique among all users)
| followedUser| String| user which is followed
| fields      | List  | List of fields to return

## Dailymotion.followUser
Follow other user

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| userId     | String| Unique object identifier (unique among all users)
| followedId | String| Unique object identifier (unique among all children)

## Dailymotion.unfollowUser
Unfollow other user

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| userId     | String| Unique object identifier (unique among all users)
| followedId | String| Unique object identifier (unique among all children)

## Dailymotion.listPaidAccessUsers
List of offers this user has paid to access.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| userId     | String| Unique object identifier (unique among all users)
| fields     | List  | List of fields to return
| page       | Number| The page number to load
| limit      | Number| Maximum number of items to return

## Dailymotion.listUserParents
List of this user's parents.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| userId     | String| Unique object identifier (unique among all users)
| fields     | List  | List of fields to return
| page       | Number| The page number to load
| limit      | Number| Maximum number of items to return

## Dailymotion.checkUserParent
Check if a given user is parent

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| userId     | String| Unique object identifier (unique among all users)
| parentId   | String| Unique object identifier (unique among all parents)
| fields     | List  | List of fields to return

## Dailymotion.addParent
Add a parent to user with its identifier

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| userId     | String| Unique object identifier (unique among all users)
| parentId   | String| Unique object identifier (unique among all parents)

## Dailymotion.deleteParent
Remove a parent from user with its identifier

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| userId     | String| Unique object identifier (unique among all users)
| parentId   | String| Unique object identifier (unique among all parents)

## Dailymotion.listRecommendedUsers
List of users recommended to this user.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| userId     | String| Unique object identifier (unique among all users)
| fields     | List  | List of fields to return
| page       | Number| The page number to load
| limit      | Number| Maximum number of items to return

## Dailymotion.listParentRelatedUsers
List of user accounts related to this user through their parents.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| userId     | String| Unique object identifier (unique among all users)
| fields     | List  | List of fields to return
| page       | Number| The page number to load
| limit      | Number| Maximum number of items to return
| sort       | Select| Change the default result set ordering.

## Dailymotion.listPlaylists
Retrieve a list of playlists

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| fields     | List  | List of fields to return
| page       | Number| The page number to load
| limit      | Number| Maximum number of items to return
| sort       | Select| Change the default result set ordering.
| search     | String| Limit the result set to this full text search.
| owner      | String| Limit the result set to playlists of this user.
| ids        | List  | Limit the result set to this list of playlist identifiers (works only with xids).

## Dailymotion.getSinglePlaylist
Retrieve a playlist with its identifier

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| playlistId | String| Id of the playlist
| fields     | List  | List of fields to return

## Dailymotion.createPlaylist
Create a playlist

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| name       | String| Name of the playlist
| description| String| Description of the playlist
| fields     | List  | List of fields to return

## Dailymotion.updatePlaylist
Update existing playlist

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| playlistId | String| ID of the playlist
| name       | String| Name of the playlist
| description| String| Description of the playlist
| fields     | List  | List of fields to return

## Dailymotion.deletePlaylist
Delete a playlist with its identifier

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| playlistId | String| Id of the playlist

## Dailymotion.listPlaylistVideos
List of videos contained in this playlist (in the order defined by its owner)

| Field         | Type  | Description
|---------------|-------|----------
| accessToken   | String| Access token token
| playlistId    | String| Unique object identifier (unique among all playlists)
| context       | String| Some resources of the API require that you provide contextual information along with your request in order to return relevant data. This is especially useful when the API cannot retrieve or guess this additional information by itself. Contextual information should only be provided when expressly needed by the resource you are trying to query. 
| deviceFilter  | Select| By default, the device is auto-detected based on the user-agent of the API consumer. Valid values are `detect`, `web`, `mobile` and `iptv`. Changing this value will filter out content not allowed on the defined device.
| familyFilter  | Select| By default, the family filter is turned **on**. Setting this parameter to `false` will stop filtering-out explit content from searches and global contexts. You should always check the result's `explicit` field when applicable as some contexts may still return those contents. You should also flag them in your UI to warn the user about the nature of the content.
| localization  | String| This will affect results language and content selection. Note that changing the localization won't give access to geoblocked content of the corresponding location. The IP address of the API consumer is always used for this kind of restriction. You can use a standard locale like `fr_FR`, `en_US` (or simply `en`, `it`) but you can also provide `detect` to tell the API to detect the most probable locale based on the consumer's location.
| sslAssets     | Select| **Get secured HTTPS URLs for all assets** (URLs, images, videos, etc.). By default, this option is turned **off**.
| thumbnailRatio| Select| **Change the size ratio for all video thumbnails.** By default, this option is set to `original`. Accepted values are `original`, `widescreen` and `square`.
| fields        | List  | List of fields to return
| sort          | Select| Change the default result set ordering.
| page          | Number| The page number to load
| limit         | Number| Maximum number of items to return
| search        | String| Limit the result set to this full text search.
| tags          | String| Limit the result set to this full text search of video tags.

## Dailymotion.checkPlaylistVideo
Check if a given user is in this playlist

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| playlistId | String| Unique object identifier (unique among all playlists)
| videoId    | String| Unique object identifier (unique among all videos)
| fields     | List  | List of fields to return

## Dailymotion.addVideosToPlaylist
Add videos to playlist

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| playlistId | String| Unique object identifier (unique among all playlists)
| ids        | List  | List of videos ids

## Dailymotion.deleteVideoFromPlaylist
Remove video from playlist

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| playlistId | String| Unique object identifier (unique among all playlists)
| videoId    | String| Unique object identifier (unique among all videos)

## Dailymotion.listChannels
Retrieve a list of channels

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| fields     | List  | List of fields to return
| page       | Number| The page number to load
| limit      | Number| Maximum number of items to return
| sort       | Select| Change the default result set ordering.

## Dailymotion.getSingleChannel
Retrieve a channel with its identifier

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| fields     | List  | List of fields to return
| page       | Number| The page number to load
| limit      | Number| Maximum number of items to return
| sort       | Select| Change the default result set ordering.

## Dailymotion.getChannelUsers
List of the top users of this channel.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| fields     | List  | List of fields to return
| page       | Number| The page number to load
| limit      | Number| Maximum number of items to return

## Dailymotion.listChannelVideos
List of videos contained in this channel (in the order defined by its owner)

| Field         | Type      | Description
|---------------|-----------|----------
| accessToken   | String    | Access token token
| channelId     | String    | Id of the channel
| context       | String    | Some resources of the API require that you provide contextual information along with your request in order to return relevant data. This is especially useful when the API cannot retrieve or guess this additional information by itself. Contextual information should only be provided when expressly needed by the resource you are trying to query. 
| deviceFilter  | Select    | By default, the device is auto-detected based on the user-agent of the API consumer. Valid values are `detect`, `web`, `mobile` and `iptv`. Changing this value will filter out content not allowed on the defined device.
| familyFilter  | Select    | By default, the family filter is turned **on**. Setting this parameter to `false` will stop filtering-out explit content from searches and global contexts. You should always check the result's `explicit` field when applicable as some contexts may still return those contents. You should also flag them in your UI to warn the user about the nature of the content.
| localization  | String    | This will affect results language and content selection. Note that changing the localization won't give access to geoblocked content of the corresponding location. The IP address of the API consumer is always used for this kind of restriction. You can use a standard locale like `fr_FR`, `en_US` (or simply `en`, `it`) but you can also provide `detect` to tell the API to detect the most probable locale based on the consumer's location.
| sslAssets     | Select    | **Get secured HTTPS URLs for all assets** (URLs, images, videos, etc.). By default, this option is turned **off**.
| thumbnailRatio| Select    | **Change the size ratio for all video thumbnails.** By default, this option is set to `original`. Accepted values are `original`, `widescreen` and `square`.
| fields        | List      | List of fields to return
| sort          | Select    | Change the default result set ordering.
| page          | Number    | The page number to load
| limit         | Number    | Maximum number of items to return
| search        | String    | Limit the result set to this full text search.
| tags          | String    | Limit the result set to this full text search of video tags.
| createdAfter  | DatePicker| Limit the result set to videos created after this date and time.
| createdBefore | DatePicker| Limit the result set to videos created before this date and time.

## Dailymotion.getSingleSubtitle
Retrieve a subtitle with its identifier

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token token
| subtitleId | String| Unique object identifier (unique among all subtitles)
| fields     | List  | List of fields to return


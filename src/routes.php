<?php
$routes = [
    'metadata',
    'getAccessToken',
    'refreshAccessToken',
    'revokeAccessToken',
    'listVideos',
    'getSingleVideo',
    'addVideo',
    'updateVideo',
    'deleteSingleVideo',
    'listRelatedVideos',
    'listFavoritesVideos',
    'checkFavoriteVideo',
    'favoriteVideo',
    'unfavoriteVideo',
    'listFeaturedVideos',
    'checkFeaturedVideo',
    'featureVideo',
    'unfeatureVideo',
    'listRecentlyWatchedVideos',
    'checkRecentlyWatchedVideo',
    'addVideoToRecentlyWathced',
    'removVideoFromRecentlyWathced',
    'listLikedVideos',
    'checkLikedVideo',
    'likeVideo',
    'unlikeVideo',
    'listSubscriptionsVideos',
    'listUserVideos',
    'listWatchlaterVideos',
    'checkWatchlaterVideo',
    'addVideoToWatchlater',
    'removeVideoFromWatchlater',
    'listVideoSubtitles',
    'addVideoSubtitles',
    'deleteVideoSubtitles',
    'listUsers',
    'getSingleUser',
    'updateUser',
    'listUserChildren',
    'checkUserChild',
    'addChild',
    'deleteChild',
    'listUserFollowers',
    'listUserFollowing',
    'checkFollowedUser',
    'followUser',
    'unfollowUser',
    'listPaidAccessUsers',
    'listUserParents',
    'checkUserParent',
    'addParent',
    'deleteParent',
    'listRecommendedUsers',
    'listParentRelatedUsers',
    'listPlaylists',
    'getSinglePlaylist',
    'createPlaylist',
    'updatePlaylist',
    'deletePlaylist',
    'listPlaylistVideos',
    'checkPlaylistVideo',
    'addVideosToPlaylist',
    'deleteVideoFromPlaylist',
    'listChannels',
    'getSingleChannel',
    'getChannelUsers',
    'listChannelVideos',
    'getSingleSubtitle'
];
foreach($routes as $file) {
    require __DIR__ . '/../src/routes/'.$file.'.php';
}


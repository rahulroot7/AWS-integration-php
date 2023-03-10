<?php
// query the user media
$fields = "id,caption,media_type,media_url,permalink,thumbnail_url,timestamp,username";
$token = "IGQVJVMl9IMV93WHhOTXd4ZAWNBNkJOWHFQTXRwTXYtaDJOcnZAkMFBiR2RHQS1NMTRWeU03VG51ZAF9ubGFqVGF1UkE5RWVkLTBnNWlpWVZABRGE3YVpLc1c3WDBKYzlDMllFNHN6dHJGeVpmOUphUTQxUAZDZD";
$limit = 10;

$json_feed_url = "https://graph.instagram.com/me/media?fields={$fields}&access_token={$token}&limit={$limit}";
$json_feed = @file_get_contents($json_feed_url);
$contents = json_decode($json_feed, true, 512, JSON_BIGINT_AS_STRING);

echo "<div class='ig_feed_container'>";
foreach ($contents["data"] as $post) {
    // echo '<pre>';
    // print_r($post);
    // die('hello');
    $username = isset($post["username"]) ? $post["username"] : "";
    $caption = isset($post["caption"]) ? $post["caption"] : "";
    $media_url = isset($post["media_url"]) ? $post["media_url"] : "";
    $permalink = isset($post["permalink"]) ? $post["permalink"] : "";
    $media_type = isset($post["media_type"]) ? $post["media_type"] : "";

    echo "
            <div class='ig_post_container'>
                <div>";

    if ($media_type == "VIDEO") {
        echo "<video controls style='width:25%; display: block !important;'>
                            <source src='{$media_url}' type='video/mp4'>
                            Your browser does not support the video tag.
                        </video>";
    } else {
        echo "<img style='width:100px' src='{$media_url}' />";
    }

    echo "</div>
                <div class='ig_post_details'>
                    <div>
                        <strong>@{$username}</strong> {$caption}
                    </div>
                    <div class='ig_view_link'>
                        <a href='{$permalink}' target='_blank'>View on Instagram</a>
                    </div>
                </div>
            </div><br>
        ";
}
echo "</div>";

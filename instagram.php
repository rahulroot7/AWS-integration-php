<?php 
// query the user media
$fields = "id,caption,media_type,media_url,permalink,thumbnail_url,timestamp,username
";
$token = "IGQVJXdl93MS10TEhkUnk4d1JtMzlLTUY1bUVTbE5BTjZAHQWFhZAERObU01cTE3VXQ5LTlwbnlYenlwZAGl5bDdEMmtMYXRib0RqajJ3dkJUMm5LUm1ZANlNvbVZA3ZADdIX194aU5XeFREcVY1MUVzeWo0SAZDZD";
$limit = 10;
 
$json_feed_url="https://graph.instagram.com/me/media?fields={$fields}&access_token={$token}&limit={$limit}";
$json_feed = @file_get_contents($json_feed_url);
$contents = json_decode($json_feed, true, 512, JSON_BIGINT_AS_STRING);
// print_r($contents );
echo "<div class='ig_feed_container'>";
    foreach($contents["data"] as $post){
        
        // echo '<pre>';
        // print_r($post);
        ?>
        <h2><?php echo $post['caption']; ?>
        <img src="<?php echo $post['media_url']; ?>" style="width: 50px;"><br>
        <a href="<?php echo $post['permalink']; ?>">Click here</a>
<?php   
    }
echo "</div>"
?>
<?php
require 'aws-module/aws-autoloader.php';
$s3config = array(
    'region'  => 'us-east-1',
    'version' => 'latest',
    'credentials' => [
        'key'    => '',//Put key here
        'secret' => ''// Put Secret here
    ]
);
$bucket = 'all-upload-website';

if (isset($_FILES["file"])) {
$s3 = new Aws\S3\S3Client($s3config);
$tmpfile = $_FILES['file'];
$key = 'resume/' .$tmpfile['name'];
$result = $s3->putObject([
        'Bucket' => $bucket,
        'Key'    => $key,
        'SourceFile' => $tmpfile['tmp_name'],
]);
$file_url = $result['ObjectURL'];
echo $file_url;
}

?>

<form action="" method="post" enctype="multipart/form-data">
    <input type='file' name='file'>
    <input type='submit'>
</form>

<!-- show all bucket files -->
<?php
$s3 = new Aws\S3\S3Client($s3config);
$tmpfile = $_FILES['file'];
$objects = $s3->getPaginator('ListObjects', [
  'Bucket' => $bucket,
  'Prefix' => 'resume/',
]);     

foreach ($objects as $result) {
    foreach ($result['Contents'] as $object) {
        $filename = basename($object['Key']);
        $result = $s3->getCommand('GetObject', array(
            'Bucket'      => $bucket,
            'Key'         => $object['Key'],
            'ContentType' => 'image/png',
            'ResponseContentDisposition' => 'attachment; filename="'.$fileName.'"'
        ));
        $signedUrl = $s3->createPresignedRequest($result, "+6 days"); 
        $presignedUrl = (string)$signedUrl->getUri();
        // echo $presignedUrl;
        ?>
        <a href="<?php echo $presignedUrl; ?>" target="blank"><?php echo $presignedUrl ?></a><br>
<?php
    }
}
 ?>
<?php

$mysqli = require __DIR__ . '../../app/database/database.php';

$sql = "SELECT username, points FROM users ORDER BY points DESC LIMIT 20";
$result = $mysqli->query($sql);

$xml = new SimpleXMLElement('<rss version="2.0"/>');
$channel = $xml->addChild('channel');
$channel->addChild('title', 'Clasament Utilizatori');
$channel->addChild('link', 'http://localhost/php/Romanian-Traffic-Signs-Tutor');
$channel->addChild('description', 'Top 20 utilizatori clasament');
$channel->addChild('language', 'en-us');
$channel->addChild('pubDate', date(DATE_RSS));
$channel->addChild('lastBuildDate', date(DATE_RSS));

while ($row = $result->fetch_assoc()) {
    $item = $channel->addChild('item');
    $item->addChild('title', htmlspecialchars($row['username']));
    $item->addChild('link', 'http://localhost/php/Romanian-Traffic-Signs-Tutor/user/' . htmlspecialchars($row['username']));
    $item->addChild('description', 'Puncte: ' . htmlspecialchars($row['points']));
    $item->addChild('pubDate', date(DATE_RSS));
}

$feedContent = $xml->asXML();
file_put_contents(__DIR__ . '/../public/feed.xml', $feedContent);

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="feed.xml"');
header('Content-Length: ' . strlen($feedContent));
readfile(__DIR__ . '/../public/feed.xml');
exit;
?>

<?php
require __DIR__ . '/vendor/autoload.php';

use Amp\Future;
use Amp\Http\Client\HttpClientBuilder;
use Amp\Http\Client\Request;

$httpClient = HttpClientBuilder::buildDefault();

$uris = [
    "competitions" => "https://sportsbull.jp/api/v4/competitions",
    "pgTop" => "https://sportsbull.jp/api/v7/page/top",
    "initializeTop" => "https://sportsbull.jp/api/v4/initialize/top",
    "ishibashi-mita" => "https://sportsbull.jp/api/v4/initialize/ishibashi-mita",
    "abema" => "https://sportsbull.jp/api/v4/initialize/abema",
    "big6tv" => "https://sportsbull.jp/api/v4/initialize/big6tv",
    "baseball" => "https://sportsbull.jp/api/v4/initialize/baseball",
    "soccer" => "https://sportsbull.jp/api/v4/initialize/soccer",
    "tennis" => "https://sportsbull.jp/api/v4/initialize/tennis",
    "basketball" => "https://sportsbull.jp/api/v4/initialize/basketball",
    "volleyball" => "https://sportsbull.jp/api/v4/initialize/volleyball",
    "golf" => "https://sportsbull.jp/api/v4/initialize/golf",
    "rugby" => "https://sportsbull.jp/api/v4/initialize/rugby",
    "battle" => "https://sportsbull.jp/api/v4/initialize/battle",
    "athletics" => "https://sportsbull.jp/api/v4/initialize/athletics",
    "swimming" => "https://sportsbull.jp/api/v4/initialize/swimming",
    "wintersports" => "https://sportsbull.jp/api/v4/initialize/wintersports",
    "motorsports" => "https://sportsbull.jp/api/v4/initialize/motorsports",
    "etc" => "https://sportsbull.jp/api/v4/initialize/etc",
    "extremesports" => "https://sportsbull.jp/api/v4/initialize/extremesports", 
];

$time_start = microtime(true);
try {
    $responses = Future\await(array_map(function ($uri) use ($httpClient) {
        return Amp\async(fn () => $httpClient->request(new Request($uri, 'HEAD')));
    }, $uris));

    foreach ($responses as $key => $response) {
        printf(
            "%s | HTTP/%s %d %s\n",
            $key,
            $response->getProtocolVersion(),
            $response->getStatus(),
            $response->getReason()
        );
    }
} catch (Exception $e) {
    // If any one of the requests fails the combo will fail
    echo $e->getMessage(), "\n";
}
echo "\n";

$time = microtime(true) - $time_start;
echo "20個のAPIを非同期実行するのにかかった時間は{$time} 秒です\n";
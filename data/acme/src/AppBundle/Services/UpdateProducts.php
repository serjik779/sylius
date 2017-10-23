<?php

namespace AppBundle\Services;


use Doctrine\ORM\EntityManager;
use Sylius\Component\Core\Model\Product;
use Sylius\Component\Core\Model\ProductVariant;

class UpdateProducts
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function updateProduct() {
        $products = $this->em->getRepository(Product::class)->findAll();
        $response = json_decode($this->getToken(), 1);
        $params = array();
        #dump($response);
//        foreach ($products as $product) {
//            #dump($product->getVariants());
//            $params = array(
//                "translations" => array(
//                    "en_US" => array(
//                        "name" => $product->getName()
//                    )
//                )
//            );
//            dump($this->send('http://192.168.1.9:8006/api/v1/products/' . $product->getCode(), $response['access_token'], $params));
//        }
//        $code = '089ee03b-f754-3cc3-9d1a-9b63a1958011';
//        $product = $this->em->getRepository(Product::class)->findOneBy(array('code' => $code));
//        $productVariants = $product->getVariants();
        $j = 0;

        $variants = $this->em->getRepository(ProductVariant::class)->findAll();

        foreach ($variants as $variant) {
            $channelPricings = $variant->getChannelPricings();
            $product = $variant->getProduct();
            #dump($channelPricings);
            foreach ($channelPricings as $channel) {
                #dump($response['access_token'] . ' ' . $channel->getChannelCode() . ' ' . $product->getCode() . ' ' . $variant->getCode());
                $price = round($channel->getPrice() / 100, 2);
                $originalPrice = $channel->getOriginalPrice()? round($channel->getOriginalPrice() / 100, 2) : 0;
                $params = array(
                    "channelPricings" => array(
                        $channel->getChannelCode() => array(
                            "price" => $price
                        )
                    )
                );
                if ($originalPrice > 0) {
                    $params['channelPricings'][$channel->getChannelCode()]['originalPrice'] = $originalPrice;
                }
                dump($this->send('http://192.168.1.97:8006/api/v1/products/' . $product->getCode() . '/variants/' . $variant->getCode(), $response['access_token'], $params));
            }

        }

//        foreach ($products as $product) {
//            $channels = $product->getChannels();
//            $i = 0;
//            $j++;
//            foreach ($channels as $channel) {
//                foreach ($product->getVariants() as $variant) {
//
//                    #if ($j >= 48) {
//                        dump($i++ . ' ' . $j . ' ' . $product->getId() . ' ' . $variant->getCode());
//                        $price = $variant->getChannelPricingForChannel($channel)->getPrice();
//                        $originalPrice = $variant->getChannelPricingForChannel($channel)->getOriginalPrice();
//                        $params = array(
//                            "channelPricings" => array(
//                                $variant->getChannelPricingForChannel($channel)->getChannelCode() => array(
//                                    "price" => $price,
//                                    "originalPrice" => $originalPrice
//                                )
//                            )
//                        );
//                        dump($this->send('http://192.168.1.9:8006/api/v1/products/' . $product->getCode() . '/variants/' . $variant->getCode(), $response['access_token'], $params));
//                    #}
//                }
//            }
//        }


    }

    private function getToken() {
        $params = array(
            'client_id' => 'demo_client',
            'client_secret' => 'secret_demo_client',
            'grant_type' => 'password',
            'username' => 'api@example.com',
            'password' => 'sylius-api'
        );
        $process = curl_init('http://192.168.1.97:8006/api/oauth/v2/token');
        curl_setopt($process, CURLOPT_HEADER, false);
        curl_setopt($process, CURLOPT_TIMEOUT, 30);

        curl_setopt($process, CURLOPT_POST, 1);
        curl_setopt($process, CURLOPT_POSTFIELDS, http_build_query($params));


        curl_setopt($process, CURLOPT_RETURNTRANSFER, true);
        $return = curl_exec($process);

        curl_close($process);
        return $return;
    }

    private function send($url, $token, $params) {
        $headers = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $token,
        ];

        $process = curl_init($url);

        curl_setopt($process, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($process, CURLOPT_HEADER, true);
        curl_setopt($process, CURLOPT_TIMEOUT, 30);

        curl_setopt($process, CURLOPT_CUSTOMREQUEST, 'PATCH');
        curl_setopt($process, CURLOPT_POSTFIELDS, json_encode($params));


        curl_setopt($process, CURLOPT_RETURNTRANSFER, false);
        $return = curl_exec($process);

        curl_close($process);

        return $return;

    }
}
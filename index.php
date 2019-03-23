<?php
    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;
    
    require 'vendor/autoload.php';

    $app = new \Slim\App;

    $app->get('/', function(){
        echo "Hello World";
    });

    $app->get('/hello',function(Request $req,Response $res){
        $res->getBody()->write("สวัสดี");
        return $res;
    });

    $app->get('/hello/{name}',function(Request $req, Response $res){
        $name = $req->getAttribute('name');
        $res->getBody()->write("Hello, $name");
        return $res;
    });

    $app->get('/product/{productId}',function(Request $req, Response $res){
        $product = array('id'=>$req->getAttribute('productId'),
                        'name'=>'Product1', 'price'=>1000 );
        $json_res = $res->withJson($product);
        return $json_res;
    });
    
    $app->get('/showproduct',function(Request $req, Response $res){
        $products = array(
            array('id'=>"1001",
                        'name'=>'Product1', 'price'=>1000 ),
            array('id'=>"1002",
                        'name'=>'Product2', 'price'=>2000 ),
            array('id'=>"1003",
                        'name'=>'Product3', 'price'=>3000 ),
        );
        $json_res = $res->withJson($products);
        return $json_res;
    });

    $app->run();
?>
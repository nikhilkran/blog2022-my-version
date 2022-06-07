<!DOCTYPE html>
<!--
 @license
 Copyright 2019 Google LLC. All Rights Reserved.
 SPDX-License-Identifier: Apache-2.0
-->
<html>
    <head>
        <title>Geocoding Service</title>
        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

        <link rel="stylesheet" type="text/css" href="./style.css" />
        <script type="module" src="./index.ts"></script>
    </head>
    <body>
        <div id="map"></div>

        <!-- 
        The `defer` attribute causes the callback to execute after the full HTML
        document has been parsed. For non-blocking uses, avoiding race conditions,
        and consistent behavior across browsers, consider loading using Promises
        with https://www.npmjs.com/package/@googlemaps/js-api-loader.
        -->
        <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback"
            defer
        ></script>

        #map {
        height: 100%;
        }

        /* 
        * Optional: Makes the sample page fill the window. 
        */
        html,
        body {
        height: 100%;
        margin: 0;
        padding: 0;
        }

        input[type=text] {
        background-color: #fff;
        border: 0;
        border-radius: 2px;
        box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
        margin: 10px;
        padding: 0 0.5em;
        font: 400 18px Roboto, Arial, sans-serif;
        overflow: hidden;
        line-height: 40px;
        margin-right: 0;
        min-width: 25%;
        }

        input[type=button] {
        background-color: #fff;
        border: 0;
        border-radius: 2px;
        box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
        margin: 10px;
        padding: 0 0.5em;
        font: 400 18px Roboto, Arial, sans-serif;
        overflow: hidden;
        height: 40px;
        cursor: pointer;
        margin-left: 5px;
        }
        input[type=button]:hover {
        background: rgb(235, 235, 235);
        }
        input[type=button].button-primary {
        background-color: #1a73e8;
        color: white;
        }
        input[type=button].button-primary:hover {
        background-color: #1765cc;
        }
        input[type=button].button-secondary {
        background-color: white;
        color: #1a73e8;
        }
        input[type=button].button-secondary:hover {
        background-color: #d2e3fc;
        }

        #response-container {
        background-color: #fff;
        border: 0;
        border-radius: 2px;
        box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
        margin: 10px;
        padding: 0 0.5em;
        font: 400 18px Roboto, Arial, sans-serif;
        overflow: hidden;
        overflow: auto;
        max-height: 50%;
        max-width: 90%;
        background-color: rgba(255, 255, 255, 0.95);
        font-size: small;
        }

        #instructions {
        background-color: #fff;
        border: 0;
        border-radius: 2px;
        box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
        margin: 10px;
        padding: 0 0.5em;
        font: 400 18px Roboto, Arial, sans-serif;
        overflow: hidden;
        padding: 1rem;
        font-size: medium;
        }
    </body>
</html>
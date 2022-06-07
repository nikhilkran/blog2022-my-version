<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Jquery Tokeniser city matching </title>
        <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

        <style>
            /* Set font styles and a neutral background color. */
            html, body, h1 {
                font-family: 'Roboto', Helvetica, sans-serif;
                font-weight: 300;
                background: #f0f0f0;
                color: #606060;
            }

            /* Center content, with a bit of padding. */
            main {
                padding: 150px;
                text-align: center;
            }
        </style>
        <link rel="stylesheet" type="text/css" href="input_style.css">
    </head>
	<body>
        <div id="jquery-script-menu">
            <div class="jquery-script-center">
                <ul>
                    <li><a href="https://www.jqueryscript.net/form/Input-Tokenizer-Plugin-jQuery.html"></a></li>
                    <li><a href="https://www.jqueryscript.net/"></a></li>
                </ul>
                <div class="jquery-script-ads"><script type="text/javascript" async="" src="https://ssl.google-analytics.com/ga.js"></script>
                    <script type="text/javascript">
                        <!--
                        google_ad_client = "ca-pub-2783044520727903";
                        /* jQuery_demo */
                        google_ad_slot = "2780937993";
                        google_ad_width = 728;
                        google_ad_height = 90;
                        //-->
                    </script>
                    <script type="text/javascript" src="https://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
                </div>
                <div class="jquery-script-clear"></div>
            </div>
        </div>
        <main>
            <h1>Jquery tokeniser for city matching suggest</h1>
            <div class="tknz-wrapper">
                <span class="tknz-wrapper-label">Tags:</span>
                <div class="tknz-list"></div>
                <span class="tknz-input-wrapper">
                    <input id="my-input" type="text" class="tknz-input">
                    <div class="tknz-suggest">
                        <ul></ul>
                    </div>
                </span>
            </div>
        </main>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" crossorigin="anonymous"></script>
        
        <script src="tokenizer.js"></script>
        <script>
            $('#my-input').tokenizer({
                source: ['Afghanistan','Albania','Algeria','Andorra','Angola','Anguilla','Antigua &amp; Barbuda','Argentina','Armenia','Aruba','Australia','Austria','Azerbaijan','Bahamas','Bahrain','Bangladesh','Barbados','Belarus','Belgium','Belize','Benin','Bermuda','Bhutan','Bolivia','Bosnia &amp; Herzegovina','Botswana','Brazil','British Virgin Islands','Brunei','Bulgaria','Burkina Faso','Burundi','Cambodia','Cameroon','Cape Verde','Cayman Islands','Chad','Chile','China','Colombia','Congo','Cook Islands','Costa Rica','Cote D Ivoire','Croatia','Cruise Ship','Cuba','Cyprus','Czech Republic','Denmark','Djibouti','Dominica','Dominican Republic','Ecuador','Egypt','El Salvador','Equatorial Guinea','Estonia','Ethiopia','Falkland Islands','Faroe Islands','Fiji','Finland','France','French Polynesia','French West Indies','Gabon','Gambia','Georgia','Germany','Ghana','Gibraltar','Greece','Greenland','Grenada','Guam','Guatemala','Guernsey','Guinea','Guinea Bissau','Guyana','Haiti','Honduras','Hong Kong','Hungary','Iceland','India','Indonesia','Iran','Iraq','Ireland','Isle of Man','Israel','Italy','Jamaica','Japan','Jersey','Jordan','Kazakhstan','Kenya','Kuwait','Kyrgyz Republic','Laos','Latvia','Lebanon','Lesotho','Liberia','Libya','Liechtenstein','Lithuania','Luxembourg','Macau','Macedonia','Madagascar','Malawi','Malaysia','Maldives','Mali','Malta','Mauritania','Mauritius','Mexico','Moldova','Monaco','Mongolia','Montenegro','Montserrat','Morocco','Mozambique','Namibia','Nepal','Netherlands','Netherlands Antilles','New Caledonia','New Zealand','Nicaragua','Niger','Nigeria','Norway','Oman','Pakistan','Palestine','Panama','Papua New Guinea','Paraguay','Peru','Philippines','Poland','Portugal','Puerto Rico','Qatar','Reunion','Romania','Russia','Rwanda','Saint Pierre &amp; Miquelon','Samoa','San Marino','Satellite','Saudi Arabia','Senegal','Serbia','Seychelles','Sierra Leone','Singapore','Slovakia','Slovenia','South Africa','South Korea','Spain','Sri Lanka','St Kitts &amp; Nevis','St Lucia','St Vincent','St. Lucia','Sudan','Suriname','Swaziland','Sweden','Switzerland','Syria','Taiwan','Tajikistan','Tanzania','Thailand','Timor LEste','Togo','Tonga','Trinidad &amp; Tobago','Tunisia','Turkey','Turkmenistan','Turks &amp; Caicos','Uganda','Ukraine','United Arab Emirates','United Kingdom','Uruguay','Uzbekistan','Venezuela','Vietnam','Virgin Islands (US)','Yemen','Zambia','Zimbabwe']

            });
        </script>
        <script type="text/javascript">

            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-36251023-1']);
            _gaq.push(['_setDomainName', 'jqueryscript.net']);
            _gaq.push(['_trackPageview']);

            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();

        </script>
        

    </body>
</html>

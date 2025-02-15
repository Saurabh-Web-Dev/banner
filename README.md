# Banner.js

![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)

## Steps

- Import banner.js in HTML file
- upload banner's and link and alt
- Copy Image ID
- Call displayBanner(width,hight,position,selector,imageId)
- And boom clicable image showing in you div

## Installation

Import in HTML.

```sh
<script src="http://localhost/banner/banner.js"></script>
<script>
    //default Setting
    displayBanner(300,100,'bottom-right','body','Mw==');
</script>
```
//param1 = width
//param2 = height
//param3 = Position
//param4 = #selector
//param5 = image_id


For Use

```sh
<body>
      <div id="banner"></div>
      <script src="http://localhost/banner/banner.js"></script>
      <script>
        displayBanner(1200,500,'bottom-right','#banner','Mw==');
      </script>
</body>
```

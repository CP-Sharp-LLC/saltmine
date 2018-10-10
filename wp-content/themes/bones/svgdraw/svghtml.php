<?php ?>
<link rel="stylesheet" href="../library/css/style.css">
<div id="canvas">
    <div class="intro">
        <span class="intro__number">01</span>
        <div class="intro__container">
            <h1 class="intro__title">Static page and blog architecture</h1>
            <p class="intro__text">Reverse Proxy & Web Server (Nginx) :: App Server (Python Simple HTTP Server) :: Asset
                Media Delivery (S3)</p>
        </div>
    </div>
    <div class="proxy">
        <h1 class="proxy__title">Reverse Proxy</h1>
        <span class="proxy__text">Nginx works as a reverse proxy to handle requests depending on the URL</span>
        <blockquote>location / { proxy_pass http://index; }</blockquote>
        <blockquote>location /articles { proxy_pass http://articles; };</blockquote>
    </div>
    <div class="container">
        <h1 class="container__title">App Server</h1>
        <span class="container__text">A Python Simple HTTP service or any sort of quick and dirty app server that can deliver static files</span>
        <span class="container__text">Both services must be able to handle relative paths, so requests can be redirected if one service fails.</span>
        <blockquote>python -m SimpleHTTPServer 8080</blockquote>
    </div>
    <div class="static">
        <h1 class="static__title">Compiled static page</h1>
        <span class="static__text">The landing page can be done  with a HTML/CSS framework like Bootstrap and post-processed with a tool chain like Gulp or Grunt</span>
        <span class="static__text">The blog can be generated through some static generator engine like Jekyll, Octopress, Hugo or Hexo.</span>
        <blockquote>hexo generate</blockquote>
        <blockquote>go build -o hugo main.go</blockquote>
    </div>
    <div class="bucket">
        <h1 class="bucket__title">Amazon S3 Bucket</h1>
        <span class="bucket__text">Versioned assets like images can be stored on S3 Buckets in order to benefit from its CDN and to reduce the project footprint.</span>
        <blockquote>http://s3.amazon.com/image.png</blockquote>
    </div>
    <div id="thisdiv"></div>
</div>

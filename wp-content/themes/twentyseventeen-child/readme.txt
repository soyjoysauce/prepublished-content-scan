# Pre-published Content Scanner
A Plugin that takes post content and scans for tags with REGEX and replaces with credentials stored in dot Env file.
```
## Usage
Insert social tags inside post_content when WP is posted
```
### Input:
<div social="yelp"></div>
<div social="facebook"></div>
<div social="twitter"></div>
```
### Result:
<div class="entry-content">
<div social="yelp" class="social-yelp"><a href="https://www.yelp.com/biz/bambu-irvine-4">Visit Yelp For More Info</a></div>
<div social="facebook" class="social-facebook"><a href="https://www.facebook.com/walmart/">Visit Facebook For More Info</a></div>
<div social="twitter" class="social-twitter"><a href="https://twitter.com/starbucks">Visit Twitter For More Info</a></div>
</div>
```

## Contributing
```
Please make sure to update tests as appropriate.

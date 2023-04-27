# PHP-Guestbook
PHP Guestbook script - Read/Write using a TEXT file <strike>and send emails directly</strike>*.

*see section "Email sending"

## OVERHAULED!
- uses JS's fetch() (asynchronous calls)
- new CSS!
- supports Emoji
- HTML form validation
- uses preloader CSS animation
- added minimal security checks: strip_tags, isset etc.

<strike>- auto-refreshes / -updates the posts</strike>

### -> add this to index.php if you need auto-refresh
this example would update the posts every 5 seconds...
<code><pre>
  setInterval(() => {
    updateDate();
    gbTextFile = "gbentries.txt?v="+h+m+s;
    fetch(gbTextFile)
     .then(response => response.text())
     .then((data) => {
      gbContainer.innerHTML = data;
    })
  }, 5000);
</pre></code>

## Email sending 
- deactivated for now... but can be reanabled by uncommenting in gb.php

## DEMO
<img src="https://raw.githubusercontent.com/peteee/php-guestbook/master/screenshots/demo.png">
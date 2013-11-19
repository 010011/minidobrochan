<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>{$title}</title>
  <meta name="viewport" content="width=480">
  <link rel="stylesheet" href="/css/dc.css">
  <script type="text/javascript" src="/js/jquery.js"></script>
  <script type="text/javascript" src="/js/dc.js"></script>
</head>

<body>
<!-- navbar -->
<a name="top"></a>
<table>
  <tr class="header">
    <td><a href="/{$board}/">К доске</a></td>
    <td><a href="/">К списку досок</a></td>
  </tr>

  <a class="scroll top" href="#top">&uarr;</a>
  <a class="scroll bottom" href="#bottom">&darr;</a>

  <!-- location -->
  <tr class="location">
    <td colspan=2>
      <h4>
        {$title}
        <a rel="nofollow" target="_blank" href="http://dobrochan.com/{$board}/res/{$thread}.xhtml">WEB</a>
      </h4>
    </td>
  </tr>

<!-- posts -->
  {foreach from=$posts item=t}
    <tr>
      <td colspan=2 class="post">
      <span class="subject">{$t->subject}</span>
      <span class="name">{$t->name}</span>
      <span class="datetime">{$t->date}</span>
      <a class="number" name="{$t->display_id}">#{$t->display_id}</a><br>
      {if $t->files}
        {foreach from=$t->files item=f}
          <a rel="nofollow" target="_blank" href="{$f->src}" class="thumb" data-thumb="{$f->thumb}">
            <span class="size">({{$f->size / 1024}|round:"2"} KБ)</span>
          </a>
        {/foreach}
      {/if}
      <div class="message">{$t->message}</div>
      </td>
    </tr>
    <tr class="separator"><td colspan=2></td></div>
  {/foreach}
  <tr class="separator"><td colspan=2><a name="bottom"></a></td></div>

  <tr class="footer">
    <td><a href="/{$board}/">К доске</a></td>
    <td><a href="/">К списку досок</a></td>
  </tr>
</table>
</body>
</html>

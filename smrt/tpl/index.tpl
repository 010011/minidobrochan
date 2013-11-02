<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=480">
  <title>{if $board}{$board} ({$page}){else}miniDobrochan{/if}</title>
  <link rel="stylesheet" href="/css/dc.css">
  <script type="text/javascript" src="/js/jquery.js"></script>
  <script type="text/javascript" src="/js/dc.js"></script>
</head>

<body>
<a name="top"></a>
<table>
  <tr class="header">
    <td colspan=2>
    {if $board}
      <a href="/">К списку досок</a>
    {else}
      <h2 class="location">miniDobrochan</h2>
    {/if}
    </td>
  </tr>

  <a class="scroll top" href="#top">&uarr;</a>
  <a class="scroll bottom" href="#bottom">&darr;</a>

  {if $board}
  <!-- location -->
  <tr class="location">
    <td colspan=2>
      <h4>
        {$board}&nbsp;({$page})
        <a rel="nofollow" target="_blank" href="http://dobrochan.com/{$board}/{$page}.xhtml">WEB</a>
      </h4>
    </td>
  </tr>
  {/if}

  {if $threads}
  <!-- threads -->
    {foreach from=$threads item=t}
      <tr>
        <td colspan=2 class="thread">
          <a href="/thread.php?board={$board}&amp;thread={$t->display_id}">
            <span class='subject'>{$t->title}</span>
          </a>
          <span class="post-count">[{$t->posts_count}]</span><br>
          {if $t->posts[0]->files}
            <a rel="nofollow" target="_blank" href="{$t->posts[0]->files[0]->src}" class="thumb" data-thumb="{$t->posts[0]->files[0]->thumb}">
              <span class="size">({{$t->posts[0]->files[0]->size / 1024}|round:"2"} KБ)</span>
            </a>
          {/if}
          <div class="message">
            {$t->posts[0]->message|truncate:200:"...":false}
          </div>
          <a class="open" target="_blank" href="/thread.php?board={$board}&amp;thread={$t->display_id}">&raquo;</a>
        </td>
      </tr>
      <tr class="separator"><td colspan=2></td></tr>
    {/foreach}
  {else}
    {include file='./all.tpl'}
  {/if}

  {if $board}
  <!-- pagination -->
  <tr class="separator"><td colspan=2><a name="bottom"></a></td></tr>
  <tr class="footer">
      {if $page == 0}
        <td><a>Назад</a></td>
      {else}
        <td><a href="/index.php?board={$board}&amp;page={$page-1}"><span>Назад</span></a></td>
      {/if}
      {if $page == $page_count}
        <td><a>Вперед</a></td>
      {else}
        <td><a href="/index.php?board={$board}&amp;page={$page+1}"><span>Вперед</span></a></td>
      {/if}
  {/if}
</table>
</body>

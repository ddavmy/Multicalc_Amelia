{if $msgs->isMessage()}
    {* <h2>Wystąpiły błędy: </h2> *}
    <div id="msgFound">
        <ol>
        {foreach $msgs->getMessages() as $msg}
        {strip}
            <li class="msg 
            {if $msg->isError()}error{/if} 
            {if $msg->isWarning()}warning{/if} 
            {if $msg->isInfo()}info{/if}">
        {$msg->text}</li>
        {/strip}
        {/foreach}
        </ol>
    </div>
    {/if}
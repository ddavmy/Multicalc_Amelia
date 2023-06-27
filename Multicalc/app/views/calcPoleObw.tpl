{extends file="main.tpl"}

{block name=header}{/block}

{block name=footer}{/block}
		
{block name=content}
	
    <section id="tilesPoleObw" class="tiles">
		<article class="style1">
			<span class="image">
				<img src="images/pic01.jpg" alt="" />
			</span>
			<a>
				<h2>Kwadrat</h2>
			</a>
		</article>
		<article class="style1">
			<span class="image">
				<img src="images/pic01.jpg" alt="" />
			</span>
			<a>
				<h2>Prostokąt</h2>
			</a>
		</article>
		<article class="style1">
			<span class="image">
				<img src="images/pic01.jpg" alt="" />
			</span>
			<a>
				<h2>Trójkąt</h2>
			</a>
        </article>
		<article class="style1">
			<span class="image">
				<img src="images/pic01.jpg" alt="" />
			</span>
			<a>
				<h2>Romb</h2>
			</a>
        </article>
		<article class="style1">
			<span class="image">
				<img src="images/pic01.jpg" alt="" />
			</span>
			<a>
				<h2>Trapez</h2>
			</a>
        </article>
		<article class="style1">
			<span class="image">
				<img src="images/pic01.jpg" alt="" />
			</span>
			<a>
				<h2>Równoległobok</h2>
			</a>
        </article>
		<article class="style1">
			<span class="image">
				<img src="images/pic01.jpg" alt="" />
			</span>
			<a>
				<h2>Koło</h2>
			</a>
        </article>
		<article class="style3">
	    	<span class="image">
	    		<img src="images/pic01.jpg" alt="" />
	    	</span>
	    	<a>
	    		<h2>Coming next</h2>
	    		<div class="content">
	    			<p>Kalkulator niedostępny na czas zmian.</p>
	    		</div>
	    	</a>
	    </article>
    </section>


    <section class="figuraProstokąt">
        <form action="{$conf->action_url}poleObwCompute#formularz" method="post" id="formularz">
            <div>
                <div class="col">
                    <div class="col-6 col-12-medium">
                        <input type="text" name="a" autocomplete="off" placeholder="Długość a" value="{$form->a}"/>
                    </div>
                    <div class="col-6 col-12-medium">
                        <input type="text" name="b" autocomplete="off" placeholder="Długość b" value="{$form->b}"/>
                    </div>
                    <div id="submit" class="col-6">
                        <input type="submit" value="Oblicz" />
                    </div>
                    <div class="col-6">
                    </div>
                </div>
            </div>
        </form>

        {include file="messages.tpl"}

        <table class="tabWynik">
        <thead>
            <tr>
                <th>Długość A</th>
                <th>Długość B</th>
                <th>Pole</th>
                <th>Obwód</th>
                <th>Figura</th>
                {if $user->role == "admin"}
                    <th>Użytkownik</th>
                    <th>Opcje</th>
                {/if}
            </tr>
        </thead>
        <tbody>
        {foreach $records as $r}
        {strip}
            <tr>
                <td>{$r["a"]}</td>
                <td>{$r["b"]}</td>
                <td>{$r["pole"]}</td>
                <td>{$r["obwod"]}</td>
                <td>{$r["nazwa"]}</td>
                {if $user->role == "admin"}
                <td>{$r["username"]}</td>
                <td>
                    <a id="recordDelete" href="{$conf->action_url}poleObwDelete/{$r['id']}">Usuń</a>
                </td>
                {/if}
            </tr>
        {/strip}
        {/foreach}
        </tbody>
        </table>
    </section>
{/block}
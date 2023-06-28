{extends file="main.tpl"}

{block name=header}{/block}

{block name=footer}{/block}
		
{block name=content}


<div id="wrapper">

	<!-- Main -->
	<div id="main">

		<article id="login" class="panel">
			<header>
				<h2>Rejestracja</h2>
			</header>
			<form action="{rel_url action="register"}" method="post">
				<div>
					<div class="col">
						<div class="col-6 col-12-xsmall">
                            <input type="text" name="login" autocomplete="off" maxlength="16" size="16" required autofocus placeholder="Username" value="{$form->login}"/>
                        </div>
                        <div class="col-6 col-12-xsmall">
                            <input type="email" name="email" autocomplete="off" maxlength="24" size="24" required placeholder="E-mail" value="{$form->email}"/>
                        </div>
                        <div class="col-6 col-12-medium">
                            <input type="password" name="pass" autocomplete="off" maxlength="24" size="24" required placeholder="Password"/>
                        </div>
                        <div id="submit" class="col-6">
                            <input type="submit" value="Zarejestruj" />
                        </div>
					</div>
				</div>
			</form>
			<h2>Posiadasz konto? Zaloguj się!</h2>
			<a href="{rel_url action="loginShow"}" class="button">Zaloguj się</a>
			<div>
				{include file='messages.tpl'}
			</div>
		</article>
	</div>
</div>

{/block}
{extends file="main.tpl"}

{block name=header}{/block}

{block name=footer}{/block}
		
{block name=content}


<div id="wrapper">

	<!-- Main -->
	<div id="main">

		<article id="login" class="panel">
			<header>
				<h2>Logowanie</h2>
			</header>
			<form action="{rel_url action="login"}" method="post">
				<div>
					<div class="col">
						<div class="col-6 col-12-medium">
							<input type="text" name="login" autocomplete="off" maxlength="16" size="16" required autofocus placeholder="Username"/>
                        </div>
                        <div class="col-6 col-12-medium">
							<input type="password" name="pass" autocomplete="off" maxlength="24" size="24" required placeholder="Password"/>
                        </div>
                        <div id="submit" class="col-6">
                            <input type="submit" value="Zaloguj" />
                        </div>
						<div class="col-6">
						</div>
					</div>
				</div>
			</form>
				<h2>Nie masz jeszcze konta?</h2>
				<a href="{rel_url action="registerShow"}" class="button">Zarejestruj się</a>
			<div>
				{include file='messages.tpl'}
			</div>
		</article>
	</div>
</div>

{/block}
<!DOCTYPE html>
<html>
<head>
	<title>Teste Bitix</title>
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>assets/css/estilo.css">
</head>
<body>
	<header>
		<div class="topo">
			<h2>Registro de Beneficiários</h2>
		</div>	
	</header>

	<section class="qtdBeneficiario">
		<h3>Para começar-mos, Diga a quantidade de Beneficiários e o plano desejado.</h3>

		<form method="POST" action="<?php echo BASE_URL ?>qtd">
			<input type="number" name="qtdBeneficiario" id="qtBeneficiarios" placeholder="Beneficiarios...">
			<select name="codPlano">
				<?php foreach($planos as $key => $value) : ?> <!--Vindo do Controller-->
					<option value="<?php echo $value->codigo ?>"><?php echo $value->nome ?></option>
				<?php endforeach; ?>
			</select>

			<input type="submit" name="acao" id="totalBeneficiarios" value="Ok!">

		</form>
	</section> <!-- Fim Section qtdBeneficiario que recebe a quantidade de beneficiarios -->

	<?php if (isset($qtdBeneficiario) && $qtdBeneficiario > 0) : ?>
		<section class="getBeneficiarios">
			<div class="setData">
					<form method="POST" action="<?php echo BASE_URL ?>Registro&total_vidas=<?php echo $qtdBeneficiario ?>&codPlano=<?php echo $codigo ?>">

						<?php for ($i=1; $i <= $qtdBeneficiario; $i++) : ?>
							<input type="text" name="nome[]" placeholder="nome do <?php echo $i ?>º beneficiario: ">
							<input type="number" name="idade[]" placeholder="idade">
							<br>
						<?php endfor; ?>

						<input type="submit" name="acao" value="Registrar!">
					</form>
			</div> <!--Fim da Div receberDados-->
		</section> <!--Fim da section getBeneficiarios-->
	<?php endif; ?>

	<?php if (isset($control) && $control == true) : ?>

		<section class="dadosRegistrados">
			<table width="800" border="1">
				<tr class="header">
					<td align="center">Nome</td>
					<td align="center">Idade</td>
					<td align="center">Valor</td>
				</tr>
				<?php foreach ($viewData as $key => $value): ?>
				<tr class="dados">
					<td align="center"><?php echo $value->nome ?></td>
					<td align="center"><?php echo $value->idade ?></td>
					<td align="center">R$<?php echo number_format($value->preco, 2, ',','.') ?></td>
				</tr>
				<?php endforeach; ?>
				<tr class="total">
					<td align="center">total</td>
					<td align="center" colspan="2">R$<?php echo number_format($valorTotal->ValorTotal, 2, ',','.')  ?></td>
				</tr>				
			</table>
		</section> <!--Fim da section dadosRegistrados-->
			<div class="footer">
				<p id="titlePlano">Plano Escolhido: </p>
				<p id="escolhido"><?php echo $planoUsuario->plano ?></p>
			</div>
			<div class="footer">
				<a href="<?php echo BASE_URL ?>">Novo Registro</a>
			</div>

	<?php endif; ?>
</body>
</html>
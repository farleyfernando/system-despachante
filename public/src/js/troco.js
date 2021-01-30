/*/calcular troco

function id(valor_campo) {

    return document.getElementById(valor_campo);

}

function getValor(valor_campo) {

    var valor = document.getElementById(valor_campo).value.replace(',', '.');
    //document.write("Valor: " + valor);
    return parseFloat(valor) * 100;

}

function sub() {

    var troco = getValor('venda_total_pago') - getValor('venda_valor_total');
    //document.write("Valor: " + troco);
    id('venda_troco').value = troco / 100;

}
*/


function calculaTroco() {

    var valorCompra = parseFloat($("#venda_valor_total").val());
    var valorPago = parseFloat($("#venda_total_pago").val());
    var valorTroco = 0;

    if (valorPago == valorCompra) {
        valorTroco = 0;
        $("#venda_troco").val(valorTroco);
        alert("Não gerou troco");

    } else if (valorPago > valorCompra) {

        valorTroco = valorPago - valorCompra;
        $("#venda_troco").val(valorTroco.toFixed(2));


    } else {
        alert("Não gerou troco (Valor pago menor que valor da compra)");
    }

    $("#valorCompra").val("");
    $("#valorPago").val("");
    $("#valorPago").focus();

}

function calculaTrocoOs() {

	var valorCompra = parseFloat($("#ordem_servico_valor_total").val());
	var valorPago = parseFloat($("#ordem_servico_total_pago").val());
	var valorTroco = 0;

	if (valorPago == valorCompra) {
		valorTroco = 0;
		$("#ordem_servico_troco").val(valorTroco);
		alert("Não gerou troco");

	} else if (valorPago > valorCompra) {

		valorTroco = valorPago - valorCompra;
		$("#ordem_servico_troco").val(valorTroco.toFixed(2));


	} else {
		alert("Não gerou troco (Valor pago menor que valor da compra)");
	}

	//$("#valorCompra").val("");
	$("#valorPago").val("");
	$("#valorPago").focus();

}

function calculaTrocoRecibo() {

	var valorCompra = parseFloat($("#recibo_servico_valor_total").val());
	var valorPago = parseFloat($("#recibo_servico_total_pago").val());
	var valorTroco = 0;

	if (valorPago == valorCompra) {
		valorTroco = 0;
		$("#recibo_servico_troco").val(valorTroco);
		alert("Não gerou troco");

	} else if (valorPago > valorCompra) {

		valorTroco = valorPago - valorCompra;
		$("#recibo_servico_troco").val(valorTroco.toFixed(2));


	} else {
		alert("Não gerou troco (Valor pago menor que valor da compra)");
	}

	//$("#valorCompra").val("");
	$("#valorPago").val("");
	$("#valorPago").focus();

}

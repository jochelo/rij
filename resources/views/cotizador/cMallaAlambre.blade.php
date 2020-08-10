@php

    Fpdf::AddPage();
    Fpdf::SetFont('Courier', 'B', 18);

    Fpdf::Image('./images/logo.png',27,10,20,5);
    Fpdf::ln(5);
	Fpdf::SetFont('Arial', 'I', 7);
	Fpdf::cell(55, 4, "CASA MATRIZ", 0, 1, 'C', false);
	Fpdf::cell(55, 4, "12 de Octubre Circunvalacion y America", 0, 1, 'C', false);
	Fpdf::cell(55, 4, "Celular: 79426068", 0, 1, 'C', false);
	Fpdf::cell(55, 4, "Oruro-Bolivia", 0, 1, 'C', false);

    Fpdf::SetFont('Arial', 'B', 25);
	Fpdf::SetMargins(15, 50, 20);
	Fpdf::cell(0, 20, "COTIZACION No ".$cotizacion->id, 0, 1, 'C', false);

	// datos del cliente
	$dias=["Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado"];
	$meses=["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
	Fpdf::SetFont('Arial', '', 13);
	Fpdf::cell(0, 8, "Oruro: ".$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]." del ".date('Y'), 0, 1, 'L', false);
	Fpdf::cell(0, 8, "Senior(es): ".$cliente->nombres.' '.$cliente->apellidos, 0, 0, 'L', false);
	//Fpdf::cell(0, 8, "NIT/CI: ".$cliente->ci, 0, 1, 'R', false);

	Fpdf::ln(8);
    // Subtitulos de Detalle
	Fpdf::SetFontSize(12);
	Fpdf::cell(10, 10, "", 0, 0, 'C', false);
	Fpdf::SetFillColor(66,66,82);
	Fpdf::SetTextColor(255,255,255);
	Fpdf::cell(10, 10, "No", 0, 0, 'C', true);
	Fpdf::cell(25, 10, "Cantidad", 0, 0, 'C', true);
	Fpdf::cell(80, 10, "Descripcion", 0, 0, 'C', true);
	Fpdf::cell(25, 10, "P.Unit", 0, 0, 'C', true);
	Fpdf::cell(25, 10, "Sub. Total", 0, 1, 'C', true);

	// Datos de Detalle

	$c=1;
	$total=0;
	Fpdf::SetTextColor(0,0,0);
    if (isset($malla)){
		Fpdf::cell(10, 10, "", 0, 0, 'C', false);
		Fpdf::cell(10, 10, $c , 0, 0, 'C', false);
		Fpdf::cell(25, 10, $datos['cantidad'], 0, 0, 'C', false);
		$Y=Fpdf::GetY();
		$X=Fpdf::GetX();
		Fpdf::multicell(70, 10, 'Malla '.$malla['tipoMalla'].'                     Dimension: '.$datos['alto'].'m x '.$datos['largo'].'m                  Metros cuadrados: '.$datos['mcuadrados'].'m2', 0, 'L', 0);
        Fpdf::SetY($Y);
        Fpdf::SetX($X+80);
		Fpdf::cell(25, 10, $datos['precioUnit'].' Bs.', 0, 0, 'C', false);
		Fpdf::cell(25, 10, $datos['precioTotal'].' Bs.', 0, 1, 'C', false);
    }
    else{
        Fpdf::cell(10, 10, "", 0, 0, 'C', false);
		Fpdf::cell(10, 10, $c , 0, 0, 'C', false);
		Fpdf::cell(25, 10, $datos['cantidad'], 0, 0, 'C', false);
		$Y=Fpdf::GetY();
		$X=Fpdf::GetX();
		Fpdf::multicell(70, 10, 'Alambre '.$alambre['tipoAlambre'].'                     Numero: '.$datos['awg'].'                                     Peso: '.$alambre['peso'].'Kg', 0, 'L', 0);
        Fpdf::SetY($Y);
        Fpdf::SetX($X+80);
		Fpdf::cell(25, 10, $datos['precioUnit'].' Bs.', 0, 0, 'C', false);
		Fpdf::cell(25, 10, $datos['precioTotal'].' Bs.', 0, 1, 'C', false);
    }
	Fpdf::ln(30);


	Fpdf::SetMargins(10, 10, 25);
	Fpdf::SetFontSize(18);
	Fpdf::cell(0, 8, "TOTAL:", 0, 0, 'L', false);
	Fpdf::cell(0, 8, $datos['precioTotal'].' Bs.', 0, 1, 'R', false);


	Fpdf::SetTitle("Cotizacion".date("Ymd H:i:s"));
	Fpdf::Output("I","Cotizacion".date("Ymd H:i:s").".pdf");

    exit;
@endphp

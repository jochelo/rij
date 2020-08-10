@php

    Fpdf::AddPage();
    Fpdf::SetFont('Courier', 'B', 18);

    Fpdf::Image('./images/logo.png',27,10,20,5);
    Fpdf::ln(5);

    Fpdf::SetFont('Arial', 'I', 12);

    Fpdf::SetFont('Arial', 'B', 20);
    Fpdf::SetMargins(15, 50, 20);
    Fpdf::cell(0, 20, "Ingresos por Periodos", 0, 1, 'C', false);

    // datos del cliente
    $dias=["Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado"];
    $meses=["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
    Fpdf::SetFont('Arial', '', 13);
    Fpdf::cell(0, 9, "Oruro: ".$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]." del ".date('Y'), 0, 1, 'L', false);
    Fpdf::SetFont('Arial', '', 6);
    Fpdf::cell(10, 10, "", 0, 0, 'C', false);
    Fpdf::cell(10, 3, 'En este reporte se muestra el ingreso economico que se obtuvo de cada cliente.', 0, 1, 'L', false);

    Fpdf::SetFont('Arial', '', 7);
    Fpdf::cell(0, 6, 'Los datos de este reporte estan siendo considerados entre las fechas '.$datos['fei'].' y '.$datos['fef'] , 0, 1, 'C', false);
    //Fpdf::cell(0, 8, "NIT/CI: ".$cliente->ci, 0, 1, 'R', false);

    Fpdf::ln(4);
    // Subtitulos de Detalle
    Fpdf::SetFontSize(9);
    //Fpdf::cell(0, 10, "", 0, 0, 'C', false);
    Fpdf::SetFillColor(66,66,82);
    Fpdf::SetTextColor(255,255,255);
    Fpdf::cell(8, 10, "No", 0, 0, 'C', true);
    Fpdf::cell(15, 10, "Fecha", 0, 0, 'C', true);
    Fpdf::cell(65, 10, "Detalle", 0, 0, 'C', true);
    Fpdf::cell(35, 10, "Cliente", 0, 0, 'C', true);
    Fpdf::cell(17, 10, "Estado", 0, 0, 'C', true);
    Fpdf::cell(17, 10, "Total", 0, 0, 'C', true);

    Fpdf::SetFontSize(12);
    Fpdf::cell(20, 10, "Ingresos", 0, 0, 'C', true);
    Fpdf::SetFontSize(9);

    Fpdf::cell(17, 10, "Saldo", 0, 1, 'C', true);

    // Datos de Detalle

    $c=1;
    $ingresoTotal=0;
    Fpdf::SetTextColor(0,0,0);
    $ymc=Fpdf::GetY();
    foreach ($ingresos as $f){
        Fpdf::SetY($ymc);
      //  Fpdf::cell(0, 10, "", 0, 0, 'C', false);
        Fpdf::cell(8, 10, $c , 0, 0, 'C', false);
        Fpdf::SetFontSize(7);
        Fpdf::cell(15, 10,$f->fecha, 0, 0, 'C', false);
        $ordenM=$f->ordenMallas;
        $detalle="";
        foreach ($ordenM as $fm){
            if(isset($fm->alto) && isset($fm->largo))
                $detalle=$detalle.'  Malla '.$fm->malla->tipoMalla.' - Dimension: '.$fm->alto.' x '.$fm->largo.' - Cantidad: '.$fm->cantidad.' [u]. ';
            else
                $detalle=$detalle.'  Malla '.$fm->malla->tipoMalla.' - Dimension: '.$fm->malla->alto.' x '.$fm->malla->largo.' - Cantidad: '.$fm->cantidad.' [u]. ';
        }
        // orden alambres
        $ordenA=$f->ordenAlambres;
        foreach ($ordenA as $fa){
            $detalle=$detalle.'  Alambre '.$fa->alambre->tipoAlambre.' - Numero: '.$fa->alambre->awg.' - Cantidad: '.$fa->cantidad.' [u].';
        }
        $Y=Fpdf::GetY();
		$X=Fpdf::GetX();


		Fpdf::SetTextColor(106,126,228);
        Fpdf::multicell(65, 10, $detalle, 0, 'L', 0);
        $ymc=Fpdf::GetY();
        Fpdf::SetFontSize(9);
        Fpdf::SetY($Y);
        Fpdf::SetX($X+65);
        Fpdf::SetTextColor(147,145,145);
        Fpdf::SetFontSize(6);
        Fpdf::cell(35, 10,$f->cliente->nombres.' '.$f->cliente->apellidos,0, 0, 'C', 0);
        Fpdf::SetFontSize(9);
        if($f->estado){
            Fpdf::SetTextColor(36,148,21);
            Fpdf::cell(17, 10,'SALDADO',0, 0, 'C', 0);
            Fpdf::SetTextColor(0,0,0);
        }
        else{
            Fpdf::SetTextColor(236,28,28);
            Fpdf::cell(17, 10,'DEUDOR', 0, 0, 'C', 0);
            Fpdf::SetTextColor(0,0,0);
        }
        Fpdf::cell(17, 10, $f->total, 0, 0, 'C', false);

        Fpdf::SetFontSize(15);
        Fpdf::cell(20, 10, $f->cancelado, 0, 0, 'C', false);
        Fpdf::SetFontSize(9);

        if(!$f->estado){
            Fpdf::SetTextColor(236,28,28);
            Fpdf::cell(17, 10, $f->total-$f->cancelado, 0, 1, 'C', false);
            Fpdf::SetTextColor(0,0,0);
        }
        else
            Fpdf::cell(17, 10, $f->total-$f->cancelado, 0, 1, 'C', false);
        $ingresoTotal+=$f->cancelado;
        $c++;
    }
    Fpdf::ln(30);

    Fpdf::SetMargins(10, 10, 25);
    Fpdf::SetFontSize(18);
    Fpdf::cell(0, 8, "INGRESO TOTAL:", 0, 0, 'L', false);
    Fpdf::cell(0, 8, $ingresoTotal.' Bs.', 0, 1, 'R', false);


    Fpdf::SetTitle("Ingresos".date("Ymd H:i:s"));
    Fpdf::Output("I","Ingresos".date("Ymd H:i:s").".pdf");

    exit;
@endphp

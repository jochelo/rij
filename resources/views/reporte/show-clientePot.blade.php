@php

    Fpdf::AddPage();
    Fpdf::SetFont('Courier', 'B', 18);

    Fpdf::Image('./images/logo.png',27,10,20,5);
    Fpdf::ln(5);

    Fpdf::SetFont('Arial', 'I', 12);

    Fpdf::SetFont('Arial', 'B', 20);
    Fpdf::SetMargins(15, 50, 20);
    Fpdf::cell(0, 20, "Clientes con Pedidos Saldados", 0, 1, 'C', false);

    // datos del cliente
    $dias=["Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado"];
    $meses=["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
    Fpdf::SetFont('Arial', '', 13);
    Fpdf::cell(0, 9, "Oruro: ".$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]." del ".date('Y'), 0, 1, 'L', false);
    Fpdf::SetFont('Arial', '', 6);
    Fpdf::cell(10, 10, "", 0, 0, 'C', false);
    Fpdf::cell(10, 3, 'En este reporte se muestra el ingreso economico que se obtuvo de cada cliente, ademas el numero de pedidos que hizo cada uno.', 0, 1, 'L', false);
    Fpdf::cell(10, 10, "", 0, 0, 'C', false);
    Fpdf::cell(10, 3, 'El numero de pedidos que se muestran son aquellos pedidos que se cancelaron en su totalidad.', 0, 1, 'L', false);
    Fpdf::SetFont('Arial', '', 7);
    Fpdf::cell(0, 6, 'Los datos de este reporte estan siendo considerados entre las fechas '.$datos['fei'].' y '.$datos['fef'] , 0, 1, 'C', false);
    //Fpdf::cell(0, 8, "NIT/CI: ".$cliente->ci, 0, 1, 'R', false);

    Fpdf::ln(4);
    // Subtitulos de Detalle
    Fpdf::SetFontSize(12);
    Fpdf::cell(10, 10, "", 0, 0, 'C', false);
    Fpdf::SetFillColor(66,66,82);
    Fpdf::SetTextColor(255,255,255);
    Fpdf::cell(15, 10, "No", 0, 0, 'C', true);
    Fpdf::cell(70, 10, "Cliente", 0, 0, 'C', true);
    Fpdf::cell(35, 10, "Ingresos", 0, 0, 'C', true);
    Fpdf::cell(45, 10, "Numero de Pedidos", 0, 1, 'C', true);

    // Datos de Detalle

    $c=1;
    Fpdf::SetTextColor(0,0,0);
    foreach ($clientePot as $f){
        Fpdf::cell(10, 10, "", 0, 0, 'C', false);
        Fpdf::cell(15, 10, $c , 0, 0, 'C', false);
        Fpdf::cell(70, 10,$f->nombres.' '.$f->apellidos, 0, 0, 'C', false);
        Fpdf::cell(35, 10, $f->ingreso, 0, 0, 'C', false);
        Fpdf::cell(45, 10, $f->npedidos, 0, 1, 'C', false);
        $c++;
    }
    Fpdf::ln(30);


    Fpdf::SetMargins(10, 10, 25);
    Fpdf::SetFontSize(18);
    //Fpdf::cell(0, 8, "CLIENTE MAS MOROSO:", 0, 0, 'L', false);
    //Fpdf::cell(0, 8, $ped->nombres.' '.$ped->apellidos, 0, 1, 'R', false);


    Fpdf::SetTitle("Clientes".date("Ymd H:i:s"));
    Fpdf::Output("I","Clientes".date("Ymd H:i:s").".pdf");

    exit;
@endphp

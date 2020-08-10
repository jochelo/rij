@php

    Fpdf::AddPage();
    Fpdf::SetFont('Courier', 'B', 18);

    Fpdf::Image('./images/logo.png',27,10,20,5);
    Fpdf::ln(5);

    Fpdf::SetFont('Arial', 'I', 12);

    Fpdf::SetFont('Arial', 'B', 20);
    Fpdf::SetMargins(15, 50, 20);
    Fpdf::cell(0, 20, "Tiempo de Cancelacion de Pedidos", 0, 1, 'C', false);

    // datos del cliente
    $dias=["Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado"];
    $meses=["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
    Fpdf::SetFont('Arial', '', 13);
    Fpdf::cell(0, 8, "Oruro: ".$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]." del ".date('Y'), 0, 1, 'L', false);
    Fpdf::SetFont('Arial', '', 6);
    Fpdf::cell(10, 10, "", 0, 0, 'C', false);
    Fpdf::cell(10, 3, 'Los dias, semanas y meses que se muestran a continuacion, representan el tiempo transcurrido hasta el momento en que cancelaron su deuda.', 0, 1, 'L', false);
    Fpdf::cell(10, 10, "", 0, 0, 'C', false);
    Fpdf::cell(10, 3, 'En caso de los pedidos que no han sido cancelados, se muestra el tiempo transcurrido hasta el dia de hoy.', 0, 1, 'L', false);
    //Fpdf::cell(0, 8, "NIT/CI: ".$cliente->ci, 0, 1, 'R', false);

    Fpdf::ln(4);
    // Subtitulos de Detalle
    Fpdf::SetFontSize(12);
    Fpdf::cell(10, 10, "", 0, 0, 'C', false);
    Fpdf::SetFillColor(66,66,82);
    Fpdf::SetTextColor(255,255,255);
    Fpdf::cell(10, 10, "No", 0, 0, 'C', true);
    Fpdf::cell(65, 10, "Cliente", 0, 0, 'C', true);
    Fpdf::cell(30, 10, "Estado", 0, 0, 'C', true);
    Fpdf::cell(30, 10, "Dias", 0, 0, 'C', true);
    Fpdf::cell(30, 10, "Meses", 0, 1, 'C', true);

    // Datos de Detalle

    $c=1;
    $d=-999;
    $ped=$ped_plazos[0];
    $pedDias=-9999;
    $fnow=new DateTime("now");

    Fpdf::SetTextColor(0,0,0);
    foreach ($ped_plazos as $f){
        Fpdf::cell(10, 10, "", 0, 0, 'C', false);
        Fpdf::cell(10, 10, $c , 0, 0, 'C', false);
        Fpdf::cell(65, 10,$f->nombres.' '.$f->apellidos, 0, 0, 'C', false);

        $up=new datetime($f->updated_at);
        $fe=new datetime($f->fecha);

        if($f->estado){
            Fpdf::SetTextColor(36,148,21);
            Fpdf::cell(30, 10,'Saldado',0, 0, 'C', 0);
            Fpdf::SetTextColor(0,0,0);
            Fpdf::cell(30, 10, $up->diff($fe)->days, 0, 0, 'C', false);
            Fpdf::cell(30, 10, $up->diff($fe)->m, 0, 1, 'C', false);
            if($pedDias<$up->diff($fe)->days){$ped=$f;$pedDias=$up->diff($fe)->days;}
        }
        else{
            Fpdf::SetTextColor(236,28,28);
            Fpdf::cell(30, 10,'Deudor', 0, 0, 'C', 0);
            Fpdf::SetTextColor(0,0,0);
            Fpdf::cell(30, 10, $fnow->diff($fe)->days, 0, 0, 'C', false);
            Fpdf::cell(30, 10, $fnow->diff($fe)->m, 0, 1, 'C', false);
            if($pedDias<$up->diff($fe)->days){$ped=$f;$pedDias=$up->diff($fe)->days;}
        }
        $c++;
    }
    Fpdf::ln(30);


    Fpdf::SetMargins(10, 10, 25);
    Fpdf::SetFontSize(18);
    Fpdf::cell(0, 8, "CLIENTE MAS MOROSO:", 0, 0, 'L', false);
    Fpdf::cell(0, 8, $ped->nombres.'  '.$ped->apellidos, 0, 1, 'R', false);


    Fpdf::SetTitle("Pedidos".date("Ymd H:i:s"));
    Fpdf::Output("I","Pedidos".date("Ymd H:i:s").".pdf");

    exit;
@endphp

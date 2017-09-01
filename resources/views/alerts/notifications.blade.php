<?php 
       
if (Session::has('message-success')) {       
 $script = "<script type='text/javascript'>
$(function () { $.msgGrowl ({
	type: 'success',
            title: 'Trasancción Exitosa'
            , text: '".Session::get('message-success').".'
            , position: 'bottom-right'
        });  });</script>
";
        echo $script;}

if (Session::has('message-errors')) {       
 $script = "<script type='text/javascript'>
$(function () { $.msgGrowl ({
	type: 'error',
            title: 'Transacción Erronea'
            , text: '".Session::get('message-errors').".'
            , position: 'bottom-right'
        });  });</script>
";
        echo $script;}

        if (Session::has('message-info')) {       
 $script = "<script type='text/javascript'>
$(function () { $.msgGrowl ({
    type: 'info',
            title: 'Transacción Erronea'
            , text: '".Session::get('message-info').".'
            , position: 'bottom-right'
        });  });</script>
";
        echo $script;}

        if (Session::has('message-warning')) {       
 $script = "<script type='text/javascript'>
$(function () { $.msgGrowl ({
    type: 'warning',
            title: 'Advertencia'
            , text: '".Session::get('message-warning').".'
            , position: 'bottom-right'
        });  });</script>
";
        echo $script;}
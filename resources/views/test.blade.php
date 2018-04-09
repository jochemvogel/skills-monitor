
@extends('adminlte::page')

@section('content')
        <?php

        use App\Http\Controllers;

        // check if the rubrics need to show up or just a form
        if(isset($_REQUEST['name'])){

            // check if the name isn't used already
            if(Controllers\rubricsController::checkName($_REQUEST['name']) == NULL){

                // show the name of the rubrics
                echo("<h1>".$_REQUEST['name']."</h1>");

                // TODO show using rubricsController wich uses fieldsController for construction
                // show the rubrics (not using the rubricsController yet)
                echo("<table class='table table-striped table-bordered'>");
                    echo("<thead>");
                    echo("</thead>");
                    echo("<tbody>");
                        for($i=0; $i<$_REQUEST['rows']; $i++){
                            echo("<tr>");
                                for($j=0; $j<$_REQUEST['cols']; $j++){
                                    echo("<td>test</td>");
                                }
                            echo("</tr>");
                        }
                    echo("</tbody>");
                echo("</table>");

                // save cols, rows and name to variable to send through the form
                $rows = $_REQUEST['rows'];
                $cols = $_REQUEST['cols'];
                $name = $_REQUEST['name'];

                // add row button
                $rows = $rows + 1;
                if($rows <= 10){
                    echo(" <br><br>
                        <form method='POST'>");
        ?>
        <input type='hidden' name='_token' value='{{ Session::token() }}'>
        <?php
        echo("
                        <input type='hidden' name='name' value='$name'>
                        <input type='hidden' name='rows' value='$rows'>
                        <input type='hidden' name='cols' value='$cols'>
                        <button class='btn-info btn-sm' type='submit' name='add_row'><i class='fa fa-plus-square-o'></i>&nbsp;&nbsp;Voeg rij toe</button>
                        </form>");
                }

                // remove row button
                $rows = $rows - 2;
                if($rows >= 1){
                    echo("<br><form method='POST'>");
        ?>
        <input type='hidden' name='_token' value='{{ Session::token() }}'>
        <?php
        echo("
                        <input type='hidden' name='name' value='$name'>
                        <input type='hidden' name='rows' value='$rows'>
                        <input type='hidden' name='cols' value='$cols'>
                        <button class='btn-danger btn-sm' type='submit' name='delete_row'><i class='fa fa-minus-square-o'></i>&nbsp;&nbsp;Verwijder rij</button>
                        </form>");
                }

                // the name exist already show the form again (with the old cols and name)
            }else{

                // show that the name of the rubrics already exists
                echo("<div class='alert text-center alert-danger'>
                    That name is already in use try something else !
                    </div>");

                // send the form again
                echo("<form method='POST'>");
            ?>
            <input type='hidden' name='_token' value='{{ Session::token() }}'>
            <?php
             echo("
                Naam: <input type='text' name='name' value='".$_REQUEST['name']."' required>
                Kolommen: <input type='number' min='1' max='10' step='1' name='cols' value='".$_REQUEST['cols']."' required>
                <input type='hidden' name='rows' value='1'>
                <input type='submit' class='btn btn-primary btn-sm' value='Save'>
                </form>");
            }
        // first time on the page show the form
        }else{

            // set the defaults for at the start of the form
            $name = "default";
            $cols = 6;

            // create the form
            echo("<form method='POST'>");
            ?>
            <input type='hidden' name='_token' value='{{ Session::token() }}'>
            <?php
                echo("Name: <input type='text' name='name' value='".$name."' required>
                Collumns: <input type='number' min='1' max='10' step='1' name='cols' value='".$cols."' required>
                <input type='hidden' name='rows' value='1'>
                <input type='submit' class='btn btn-primary btn-sm' value='Save'>
                </form>");
        }
        ?>
@endsection
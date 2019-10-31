<!DOCTYPE html>
<html>

    <head>

        <title>Sistema de Controle de Acessos</title>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width">

        <!--<link rel="stylesheet" href="css/estilo.css">-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/teste2.css">

        <style>
          body {font-family: "Lato", sans-serif}
          /*.mySlides {display: none}*/
          

          .btn_submit{
            font-size: small;
            background: #0489b1;
            font-family: Montserrat;
            color: #eeeeee;
            font-weight: bold;
            cursor: pointer;
            border-radius: 5px;
          }
          .btn_submit:hover{
            background: #0000ff;
          }
          .btn_submit:disabled{background: #dddddd;}

          .flex-child{
           margin-left:5px;
           padding: 5px;
          }
          .div_botoes{
            text-align: center;
            width: 100%;
          }
        </style>

         <script language="Javascript">
           function verifica_saida(){
              if (document.form_es.es.options.selectedIndex == 1){
                document.getElementById('btn_es').disabled = false;
              }else if(document.form_es.es.options.selectedIndex == 2){
                document.getElementById('btn_es').disabled = false;
               }else{
                  document.getElementById('btn_es').disabled = true;    
                }
            }
             </script>
           </head>

    <body>

  <!-- campo dos menus-->
   <div id="header" class="w3-top">
      <div id="mainnav" class="w3-bar w3-black w3-card">
            			
		<a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Início</a>
    <a href="cadastro_visitantes.html" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Cadastrar visitante</a>  
                <!--<li><a href="cadastro_moradores.html" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Cadastrar Morador</a></li>	-->
    <a href="ListaVisitantes.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Lista de Visitantes</a>
    <a href="bkp.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Fazer backup</a>	
                  <!--<li>&copy;2019 - Fundação Educacional Colégio João XXIII</li>-->		 					
	    	
         </div>
       </div>
 <div class="div_botoes" style="max-width:2000px;margin-top:46px">
  <button type="button" class="btn_submit w3-button w3-blue" onClick="document.getElementById('div_es').style.display ='block';">Registrar entrada/saída</button>
   <button type="button" class="btn_submit w3-button w3-blue" onClick="document.getElementById('div_procura').style.display ='block';">Procurar um cadastro</button>
    <button type="button" class="btn_submit w3-button w3-blue" onClick="document.getElementById('div_relat').style.display ='block';">Gerar Relatório</button>
   </div>
     <div id="div_es" class="div_central">
   <form method="POST" action="es.php" name="form_es">
   <span style="float: right;cursor: pointer;" onclick="document.getElementById('div_es').style.display ='none';">(X)</span>
      <label for="identificador"><strong>Entrada / Saída: </strong></label><input type="text" name="chave" id="chave" placeholder="rg ou CPF" required />
        <select name="es" onchange="verifica_saida();">    
           <option>Escolha</option>
             <option>Entrou</option>
                 <option>Saiu</option>
                   </select>     
             <input type="text" name="bloco" id="input_bloco" placeholder="Prédio" required />
             <input type="text" name="apto" id="input_apto" placeholder="Setor" required />
            <input type="text" name="autorizado" id="input_aut" placeholder="Quem autorizou?" required />
           <input type="submit" value="Registrar entrada/saída" id="btn_es" name="btn_es" disabled />
         </form>   
      </div>

<div id="div_procura" class="div_central">
      <span style="float: right;cursor: pointer;" onclick="document.getElementById('div_procura').style.display ='none';">(X)</span>
     <form action="procura_cadastro.php" method="post" id="form_busca">
       <label for="chave"><strong>Procurar cadastro:</strong></label><input type="text" name="chave" placeholder="Nome,Rg ou CPF" required /><input type="submit" value="Procurar Cadastro">
          </form>
            </div>
<div id="div_relat" class="div_central">
      <span style="float: right;cursor: pointer;" onclick="document.getElementById('div_relat').style.display ='none';">(X)</span>
     <form action="relatorio.php" method="post" id="form_relat">
       <label for="data_inicio"><strong>Gerar relatório</strong></label>
        <input type="date" name="data_inicio" required />
          <input type="date" name="data_fim" required /> 
          <input type="text" id="input_relat" name="pessoa" placeholder="Nome (deixar em branco para todos)">
           <input type="submit" value="Gerar relatório">
          </form>
            </div>

<h2 >Últimos acessos</h2>
         <div style="display: flex;flex-direction: column;width: 95%;">
<table>
          <?php
           date_default_timezone_set('America/Sao_Paulo');
             $connect = mysqli_connect('localhost','root','','portaria');
               mysqli_set_charset($connect,'utf8');
                $query_select = "SELECT * FROM acessos order by data DESC limit 5";
                     $select = mysqli_query($connect,$query_select);
                      while($valor = mysqli_fetch_assoc($select)){
                        $data_dia = substr($valor['data'],8,2);
                         $data_mes = substr($valor['data'],5,2);
                           $data_ano = substr($valor['data'],0,4);
                         $hora = $valor['hora']; 
                        $foto = $valor['foto']; 

                        echo "<tr><td><a href='".$valor['foto']."' target='_blank'><img src='".$valor['foto']."' width='70' height='90'></a></td>";
                      /*echo "<tr><td><a href='".$foto."' target='_blank'><img id='acesso_foto' width='70' height='90' src='portaria-master/imagens/".$foto."' onError=this.onerror=null;this.src='imagens/imagem.jpg';></a></td>"; */

                      /*echo "<tr><td><img id='img_foto' src='portaria-master/imagens/".$foto."' width='120' height='120' onError=this.onerror=null;this.src='imagens/imagem.jpg';></td>";*/

                 echo "<td>".$data_dia."/".$data_mes."/".$data_ano."</td><td>".$hora."</td>";
              echo "<td>".$valor['nome']."</td>";
             echo "<td>Prédio: ".$valor['bloco']."</td>";
            echo "<td>Setor: ".$valor['apto']."</td>";
            echo "<td>".$valor['dentro_fora']."</td>";	     
         echo "</tr>";                                                    }
        mysqli_close($connect);
          ?> 
</table>    
         </div>
</body>
</html>








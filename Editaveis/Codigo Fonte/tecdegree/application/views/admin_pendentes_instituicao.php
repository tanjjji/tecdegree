


      <!--main content start-->
      <section id="main-content">
        <?php 
            if($this->session->flashdata('sucesso') == TRUE){
                echo '<div class="alert alert-success alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Sucesso!</strong> Curso cadastrado com sucesso!</div>'; 
            }
        ?>
          <section class="wrapper">

          </br> </br>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th class="">ID</th>
            <th class="">Sigla</th>
            <th class="">Nome</th>
            <th class="">Categoria Administrativa</th>
            <th class="">Visualizar</th>
        </tr>
    </thead>
    <tbody>
  
    <?php
        foreach ($instituicoes as $item){
            echo '<form action="aprovar_instituicoes/'.$item->id.'" method="post">';
            echo '<td style="text-align:center;" class="" id="id">'.$item->id.'</td>';
            echo '<td class="" id="sigla">'.$item->sigla.'</td>';  
            echo '<td style="text-align:center;" class="" id="nome">'
                .$item->nome.'</td>';
            echo '<td style="text-align:center;" class="" id="categoria_adm">'.$item->categoria_adm.'</td>';
            echo '<td style="text-align:center;">';
            echo '<button class="btn btn-info" type="submit">Visualizar</button>';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
        } 
    ?>   
    </tbody>
</table>

<script type="text/javascript">
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 

        var recipient = button.data('id') 
        var recipienttitulo = button.data('titulo')
        var recipienttexto = button.data('texto') 
        var recipientdata = button.data('data') 
        var recipienttipo = button.data('tipo') 
        var recipientidimagem = button.data('imagem_id');

        var modal = $(this)
        modal.find('#id').val(recipient);
        modal.find('#recipient-name').val(recipienttitulo);
        modal.find('#data').val(recipientdata);
        modal.find('#descricao');
        modal.find('#imagem_id');


    })
</script>


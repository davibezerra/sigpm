<table>
    <tr>
        <td>Unidade</td>
        <td><strong><?php echo $unidade->nome;?> / <?php echo $unidade->descricao;?></strong></td>
    </tr>
    <tr>
        <td>Slogan</td>
        <td><?php echo $unidade->slogan;?></td>
    </tr>
    <tr>
        <td>Endereço</td>
        <td><?php echo $unidade->logradouro->logradourotipo->nome;?> <?php echo $unidade->logradouro->nome;?>, <?php echo $unidade->numero;?>, <?php echo $unidade->complemento;?>, <?php echo $unidade->logradouro->bairro->nome;?>, <?php echo $unidade->logradouro->bairro->distrito->nome;?>, <?php echo $unidade->logradouro->bairro->distrito->municipio->nome;?>/<?php echo $unidade->logradouro->bairro->distrito->municipio->estado->sigla;?></td>
    </tr>
    <tr>
        <td colspan="2"><a href="javascript:history.back()">voltar</a></td>
    </tr>
</table>
<?php


/* End of file detalhar.php */
/* Location: ./application/views/desktop/unidades/detalhar.php */


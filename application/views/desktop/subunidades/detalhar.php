<table>
    <tr>
        <td>Cód. Subunidade</td>
        <td><strong><?php echo $subunidade->id;?></strong></td>
    </tr>
    <tr>
        <td>Subunidade</td>
        <td><strong><?php echo $subunidade->nome;?> / <?php echo $subunidade->descricao;?></strong></td>
    </tr>
    <tr>
        <td>Unidade Pai</td>
        <td><?php echo $subunidade->unidade->nome;?> / <?php echo $subunidade->unidade->descricao;?></td>
    </tr>
    <tr>
        <td>Endereço</td>
        <td><?php echo $subunidade->logradouro->logradourotipo->nome;?> <?php echo $subunidade->logradouro->nome;?>, <?php echo $subunidade->logradouro->bairro->nome;?>, <?php echo $subunidade->logradouro->bairro->distrito->nome;?>, <?php echo $subunidade->logradouro->bairro->distrito->municipio->nome;?>/<?php echo $subunidade->logradouro->bairro->distrito->municipio->estado->sigla;?></td>
    </tr>
    <tr>
        <td colspan="2"><a href="javascript:history.back()">voltar</a></td>
    </tr>
</table>
<?php


/* End of file detalhar.php */
/* Location: ./application/views/desktop/subunidades/detalhar.php */


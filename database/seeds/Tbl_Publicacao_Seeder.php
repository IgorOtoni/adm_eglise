<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tbl_Publicacao_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_publicacoes')->insert([
            'id'=>1,
            'nome'=>'Teste',
            'html'=>'
            <p><br />\r\n
            teste</p>\r\n
            \r\n
            <p><strong>oi</strong></p>\r\n
            \r\n
            <ul>\r\n
            \t<li>tetse</li>\r\n
            \t<li>teste</li>\r\n
            </ul>\r\n
            \r\n
            <p><a href="https://www.google.com/url?sa=i&amp;rct=j&amp;q=&amp;esrc=s&amp;source=images&amp;cd=&amp;ved=2ahUKEwj50rHY-7jhAhVMDrkGHR_oDQoQjRx6BAgBEAU&amp;url=https%3A%2F%2Fwww.multarte.com.br%2Fimagens-de-amor-e-fotos%2F&amp;psig=AOvVaw2MIrU8CYq0Z0OCpJFhrcjq&amp;ust=1554554129699081" target="_blank"><img alt="Resultado de imagem para imagens" src="https://i2.wp.com/www.multarte.com.br/wp-content/uploads/2015/08/imagens-amor.jpg?fit=1680%2C1050&amp;ssl=1" style="height:369px; margin-top:0px; width:590px" /></a></p>
            ',
            'id_igreja'=>1,
        ]);
        DB::table('tbl_publicacoes')->insert([
            'id'=>2,
            'nome'=>'Teste',
            'html'=>'
            <p><br />\r\n
            teste</p>\r\n
            \r\n
            <p><strong>oi</strong></p>\r\n
            \r\n
            <ul>\r\n
            \t<li>tetse</li>\r\n
            \t<li>teste</li>\r\n
            </ul>\r\n
            \r\n
            <p><a href="https://www.google.com/url?sa=i&amp;rct=j&amp;q=&amp;esrc=s&amp;source=images&amp;cd=&amp;ved=2ahUKEwj50rHY-7jhAhVMDrkGHR_oDQoQjRx6BAgBEAU&amp;url=https%3A%2F%2Fwww.multarte.com.br%2Fimagens-de-amor-e-fotos%2F&amp;psig=AOvVaw2MIrU8CYq0Z0OCpJFhrcjq&amp;ust=1554554129699081" target="_blank"><img alt="Resultado de imagem para imagens" src="https://i2.wp.com/www.multarte.com.br/wp-content/uploads/2015/08/imagens-amor.jpg?fit=1680%2C1050&amp;ssl=1" style="height:369px; margin-top:0px; width:590px" /></a></p>
            ',
            'id_igreja'=>2,
        ]);
        DB::table('tbl_publicacoes')->insert([
            'id'=>3,
            'nome'=>'Teste',
            'html'=>'
            <p><br />\r\n
            teste</p>\r\n
            \r\n
            <p><strong>oi</strong></p>\r\n
            \r\n
            <ul>\r\n
            \t<li>tetse</li>\r\n
            \t<li>teste</li>\r\n
            </ul>\r\n
            \r\n
            <p><a href="https://www.google.com/url?sa=i&amp;rct=j&amp;q=&amp;esrc=s&amp;source=images&amp;cd=&amp;ved=2ahUKEwj50rHY-7jhAhVMDrkGHR_oDQoQjRx6BAgBEAU&amp;url=https%3A%2F%2Fwww.multarte.com.br%2Fimagens-de-amor-e-fotos%2F&amp;psig=AOvVaw2MIrU8CYq0Z0OCpJFhrcjq&amp;ust=1554554129699081" target="_blank"><img alt="Resultado de imagem para imagens" src="https://i2.wp.com/www.multarte.com.br/wp-content/uploads/2015/08/imagens-amor.jpg?fit=1680%2C1050&amp;ssl=1" style="height:369px; margin-top:0px; width:590px" /></a></p>
            ',
            'id_igreja'=>3,
        ]);
    }
}

<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_Menu extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            // Menus padre
            ['nombre' => 'Inicio', 'menu_id' => '0', 'url' => 'admin/index', 'orden' => '1', 'icono' => 'fas fa-home'],
            ['nombre' => 'Sistema', 'menu_id' => '0', 'url' => '#', 'orden' => '2', 'icono' => 'fas fa-tools'],
            //----------------------------------------------------------------------------------------------------------------------
            // Menus hijos
            //----------------------------------------------------------------------------------------------------------------------
            ['nombre' => 'Menús', 'menu_id' => '2',  'url' => 'admin/menu-index', 'orden' => '1',  'icono' => 'fas fa-list-ul'],
            ['nombre' => 'Roles Usuarios', 'menu_id' => '2', 'url' => 'admin/rol-index', 'orden' => '2', 'icono' => 'fas fa-user-tag'],
            ['nombre' => 'Menú - Roles', 'menu_id' => '2', 'url' => 'admin/_menus_rol', 'orden' => '3', 'icono' => 'fas fa-chalkboard-teacher'],
            ['nombre' => 'Permisos', 'menu_id' => '2', 'url' => 'admin/permiso-index', 'orden' => '4', 'icono' => 'fas fa-lock'],
            ['nombre' => 'Permisos -Rol', 'menu_id' => '2', 'url' => 'admin/_permiso-rol', 'orden' => '5', 'icono' => 'fas fa-user-lock'],
            ['nombre' => 'Usuarios', 'menu_id' => '2', 'url' => '#', 'orden' => '5', 'icono' => 'fas fa-user-friends'],
            // Menus padre
            ['nombre' => 'Gestionar', 'menu_id' => '0', 'url' => '#', 'orden' => '3', 'icono' => 'fas fa-chalkboard-teacher'],
            //----------------------------------------------------------------------------------------------------------------------
            // Menus hijos
            //----------------------------------------------------------------------------------------------------------------------
            ['nombre' => 'Listado PQR', 'menu_id' => '9',  'url' => 'usuario/listado', 'orden' => '1',  'icono' => 'far fa-list-alt'],
            ['nombre' => 'Generar PQR', 'menu_id' => '9',  'url' => 'usuario/generar', 'orden' => '2',  'icono' => 'fas fa-plus-square'],
            //----------------------------------------------------------------------------------------------------------------------
            // Menus  padre
            //----------------------------------------------------------------------------------------------------------------------
            ['nombre' => 'Otras opciones', 'menu_id' => '0', 'url' => '#', 'orden' => '4', 'icono' => 'fas fa-question-circle'],
            //----------------------------------------------------------------------------------------------------------------------
            ['nombre' => 'Consulte nuestas políticas de datos', 'menu_id' => '12', 'url' => 'usuario/consulta-politicas', 'orden' => '1', 'icono' => 'fas fa-question-circle'],
            //----------------------------------------------------------------------------------------------------------------------
            ['nombre' => 'Ayuda', 'menu_id' => '12', 'url' => 'usuario/ayuda', 'orden' => '2', 'icono' => 'fas fa-question-circle'],
            //----------------------------------------------------------------------------------------------------------------------
            ['nombre' => 'Actualizar datos', 'menu_id' => '12', 'url' => 'usuario/actualizar-datos', 'orden' => '3', 'icono' => 'fas fa-edit'],
            // Menus  padre
            //----------------------------------------------------------------------------------------------------------------------
            ['nombre' => 'Cambiar contraseña', 'menu_id' => '12', 'url' => 'usuario/cambiar-password', 'orden' => '4', 'icono' => 'fas fa-key'],
            // Menus  padre
            //----------------------------------------------------------------------------------------------------------------------
            //----------------------------------------------------------------------------------------------------------------------
            //Menus funcionario
            ['nombre' => 'Listado PQR', 'menu_id' => '0', 'url' => 'funcionario/listado', 'orden' => '8', 'icono' => 'fas fa-question-circle'],
            //----------------------------------------------------------------------------------------------------------------------
            ['nombre' => 'Crear usuario asistido', 'menu_id' => '0', 'url' => 'funcionario/crear-usuario', 'orden' => '9', 'icono' => 'fas fa-user-plus'],
            //----------------------------------------------------------------------------------------------------------------------
            ['nombre' => 'Actualizar datos', 'menu_id' => '0', 'url' => 'funcionario/actualizar-datos', 'orden' => '10', 'icono' => 'fas fa-edit'],
            // Menus  padre
            //----------------------------------------------------------------------------------------------------------------------
            ['nombre' => 'Cambiar contraseña', 'menu_id' => '0', 'url' => 'funcionario/cambiar-password', 'orden' => '11', 'icono' => 'fas fa-key'],
            // Menus  padre
            //----------------------------------------------------------------------------------------------------------------------
            ['nombre' => 'Listado usuarios', 'menu_id' => '0', 'url' => 'funcionario/listado-usuarios', 'orden' => '12', 'icono' => 'fas fa-list-ul'],
            // Menus  padre
            //----------------------------------------------------------------------------------------------------------------------
            ['nombre' => 'Parametros', 'menu_id' => '0', 'url' => '#', 'orden' => '13', 'icono' => 'fas fa-cogs'],
            //----------------------------------------------------------------------------------------------------------------------
            ['nombre' => 'Categorias', 'menu_id' => '21',  'url' => 'admin/categorias-index', 'orden' => '1',  'icono' => 'fas fa-list-ul'],
            ['nombre' => 'Productos', 'menu_id' => '21',  'url' => 'admin/productos-index', 'orden' => '2',  'icono' => 'fas fa-list-ul'],
            ['nombre' => 'Marcas', 'menu_id' => '21',  'url' => 'admin/marcas-index', 'orden' => '3',  'icono' => 'fas fa-list-ul'],
            ['nombre' => 'Referencias', 'menu_id' => '21',  'url' => 'admin/referencias-index', 'orden' => '4',  'icono' => 'fas fa-list-ul'],
            //----------------------------------------------------------------------------------------------------------------------
        ];

        foreach ($menus as $menu) {
            DB::table('menu')->insert([
                'nombre' => utf8_encode(utf8_decode($menu['nombre'])),
                'menu_id' => $menu['menu_id'],
                'url' => $menu['url'],
                'orden' => $menu['orden'],
                'icono' => $menu['icono'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}

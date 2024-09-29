<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeshbordController extends Controller
{

    public function cards()
    {
        return view('admin/db/cards-basic');
    }

    public function perfect_scrollbar()
    {
        return view('admin/db/extended-ui-perfect-scrollbar');
    }

    public function text_divider()
    {
        return view('admin/db/extended-ui-text-divider');
    }

    public function layouts_horizontal()
    {
        return view('admin/db/form-layouts-horizontal');
    }

    public function layouts_vertical()
    {
        return view('admin/db/form-layouts-vertical');
    }

    public function basic_inputs()
    {
        return view('admin/db/forms-basic-inputs');
    }

    public function input_groups()
    {
        return view('admin/db/forms-input-groups');
    }

    public function icons_boxicons()
    {
        return view('admin/db/icons-boxicons');
    }

    public function layouts_blank()
    {
        return view('admin/db/layouts-blank');
    }
    public function layouts_container()
    {
        return view('admin/db/layouts-container');
    }
    public function layouts_fluid()
    {
        return view('admin/db/layouts-fluid');
    }
    public function without_menu()
    {
        return view('admin/db/layouts-without-menu');
    }
    public function without_navbar()
    {
        return view('admin/db/layouts-without-navbar');
    }

    public function settings_account()
    {
        return view('admin/db/pages-account-settings-account');
    }

    public function settings_connections()
    {
        return view('admin/db/pages-account-settings-connections');
    }

    public function settings_notifications()
    {
        return view('admin/db/pages-account-settings-notifications');
    }

    public function misc_error()
    {
        return view('admin/db/pages-misc-error');
    }

    public function misc_under()
    {
        return view('admin/db/pages-misc-under-maintenance');
    }

    public function tables_basic()
    {
        return view('admin/db/tables-basic');
    }

    public function ui_accordion()
    {
        return view('admin/db/ui-accordion');
    }

    public function ui_alerts()
    {
        return view('admin/db/ui-alerts');
    }

    public function ui_badges()
    {
        return view('admin/db/ui-badges');
    }

    public function ui_buttons()
    {
        return view('admin/db/ui-buttons');
    }

    public function ui_carousel()
    {
        return view('admin/db/ui-carousel');
    }

    public function ui_collapse()
    {
        return view('admin/db/ui-collapse');
    }

    public function ui_dropdowns()
    {
        return view('admin/db/ui-dropdowns');
    }

    public function ui_footer()
    {
        return view('admin/db/ui-footer');
    }

    public function uilist_groups()
    {
        return view('admin/db/ui-list-groups');
    }

    public function ui_modals()
    {
        return view('admin/db/ui-modals');
    }

    public function ui_navbar()
    {
        return view('admin/db/ui-navbar');
    }

    public function ui_offcanvas()
    {
        return view('admin/db/ui-offcanvas');
    }

    public function ui_pagination()
    {
        return view('admin/db/ui-pagination-breadcrumbs');
    }

    public function ui_progress()
    {
        return view('admin/db/ui-progress');
    }

    public function ui_spinners()
    {
        return view('admin/db/ui-spinners');
    }

    public function ui_tabs()
    {
        return view('admin/db/ui-tabs-pills');
    }

    public function ui_toasts()
    {
        return view('admin/db/ui-toasts');
    }

    public function ui_tooltips()
    {
        return view('admin/db/ui-tooltips-popovers');
    }

    public function ui_typography()
    {
        return view('admin/db/ui-typography');
    }





    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/db/deshbord');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

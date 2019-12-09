<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{

    /**
     *
     */
    public function inicio()
    {
        try{
//            $bannerService = new BannerService();
//            $banners = $bannerService->listar();
            return view('publico.pagina.inicio');

        }catch (\Exception $e){
            return redirect('/')->withErrors($e->getMessage());
        }
    }


}

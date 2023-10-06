<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index()
    {
        $data = Produk::latest()->get();
        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    public function store(ProdukRequest $req)
    {
        try {
            $data = Produk::create($req->all());
            if ($data) {
                return response()->json([
                    'success' => true,
                    'data' => $data
                ]);
            } else {
                return response()->json([
                    'success' => false,
                ], 500);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    public function show(int $id)
    {
        $data = Produk::find($id);
        if ($data) {
            return response()->json([
                'success' => true,
                'data' => $data,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data does not exist'
            ], 404);
        }
    }

    public function update(UpdateProdukRequest $req, int $id)
    {
        $data = Produk::find($id);
        try {
            $updated = $data->update($req->all());
            if ($updated) {
                return response()->json([
                    'success' => true,
                    'data' => $data
                ]);
            } else {
                return response()->json([
                    'success' => false,
                ], 500);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    public function destroy(int $id)
    {
        $data = Produk::find($id);
        try {
            if ($data) {
                $data->delete();
                return response()->json([
                    'success' => true,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data does not exist'
                ], 404);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'error' => $th->getMessage(),
            ], 500);
        }
    }
}

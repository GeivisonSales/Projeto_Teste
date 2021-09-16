import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class AppService {

  APIUrl = 'http://localhost:80/Sistema%20teste%20para%20(Traux)/projeto/api/actions/';

  constructor(private http: HttpClient) { }

  listarProdutos() {
    return this.http.get<Array<any>>(this.APIUrl + "?method=get&table=products");
  }

  listarCategorias() {
    return this.http.get<Array<any>>(this.APIUrl + "?method=get&table=category");
  }

  criarProduto(dado: any) {
    return this.http.post(this.APIUrl, dado);
  }

  criarCategoria(dado: any) {
    return this.http.post(this.APIUrl, dado);
  }
}
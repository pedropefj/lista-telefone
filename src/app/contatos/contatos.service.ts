import{Injectable} from '@angular/core'
import{Contato} from './contato/contato.model'
import{Http,Headers,RequestOptions} from '@angular/http'
import{Observable} from 'rxjs/Observable'

import{MEAT_API} from '../app.api'
import{ErrorHandler} from '../app.error-handle'



import 'rxjs/add/operator/map'
import 'rxjs/add/operator/catch'


@Injectable()

export class ContatosServices{
/*  contatos: Contato[] =[
    {id:1, nome: "Pedro",telefone:"31991973112",email:"pedro.pefj@hotmail.com"},
    {id:2, nome: "Joelce",telefone:"31986349216",email:"joelce.silva@yahoo.com.br"}
  ]*/

contatos :Contato[] =[]

 constructor(private http: Http){}

  todosContatos(): Observable<Contato[]>{
  return this.http.get(`${MEAT_API}/telefones/page/get_telefones`)
  .map(response => response.json())
  .catch(ErrorHandler.handleError)
  }

  contatoById(id: string):Observable<Contato>{
    return this.http.get(`${MEAT_API}/telefones/page/get_telefone/${id}`)
      .map(response=>response.json())
      .catch(ErrorHandler.handleError)
    }

    addContato(contato: Contato):Observable<string>{
    const headers = new Headers()
    headers.append('Content-Type', 'application/json')

    return this.http.post(`${MEAT_API}/telefones/page/cadastrar_telefone`,
                          JSON.stringify(contato),
                          )
                    .map(response=> response.json())
    }

    remove(contato: Contato){
        const headers = new Headers()
        headers.append('Content-Type', 'application/json')
        return this.http.get(`${MEAT_API}/telefones/page/deletar_telefone/${contato.id}`,
                              JSON.stringify(contato))

       }
       updateContato(contato : Contato):Observable<string>{
         const headers = new Headers()
         headers.append('Content-Type', 'application/json')
         return this.http.post(`${MEAT_API}/telefones/page/update_telefone`,
                               JSON.stringify(contato))
                         .map(response=> response.json())
          }

    }

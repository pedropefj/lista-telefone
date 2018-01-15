import { Component, OnInit } from '@angular/core';
import{Contato} from '../contatos/contato/contato.model'
import{ContatosServices} from '../contatos/contatos.service'
import{Router} from '@angular/router'
@Component({
  selector: 'mt-cadastrar',
  templateUrl: './cadastrar.component.html'
})
export class CadastrarComponent implements OnInit {

  contato: Contato
  constructor(private contatosService: ContatosServices,
              private router: Router) { }
  retorno : string
  ngOnInit() {
    this.contato = new Contato()
  }

  addContato(){
   this.contatosService.addContato(this.contato)
   .subscribe((orderId: string ) => {
        this.router.navigate(['/listaContatos'])
      })
  }

}

import { Component, OnInit } from '@angular/core';
import{Contato} from './contato/contato.model'
import{ContatosServices} from './contatos.service'

@Component({
  selector: 'mt-contatos',
  templateUrl: './contatos.component.html'
})
export class ContatosComponent implements OnInit {
  public contatos: Contato[]
  contato: Contato
  flag :boolean= false

  public searchTerm: string;

  constructor(private contatosServices:ContatosServices) {
    this.contato = new Contato()
   }



  ngOnInit() {
    this.contatosServices.todosContatos().subscribe(contatos => this.contatos = contatos)
  }
  remove(contato: Contato){
    this.contatosServices.remove(contato).subscribe()
    this.contatos.splice(this.contatos.indexOf(contato),1)
  }
    editar(contato: Contato){
        this.contato = contato
        this.flag = true
    }
    atualizarContato(){
        let index = this.contatos.indexOf(this.contato)
        this.contatos[index] = this.contato
        this.flag = false
        this.contatosServices.updateContato(this.contato).subscribe()
    }
}

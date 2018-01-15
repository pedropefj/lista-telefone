import { Component, OnInit,Input,Output,EventEmitter } from '@angular/core';
import{Contato} from './contato.model'
import{Router} from '@angular/router'
import{ContatosServices} from '../contatos.service'
@Component({
  selector: 'mt-contato',
  templateUrl: './contato.component.html'
})
export class ContatoComponent implements OnInit {

@Input() contatos: Contato[]
@Output() remove = new EventEmitter<Contato>()
@Output() editar = new EventEmitter<Contato>()
  constructor(private router: Router,
              private contatosServices: ContatosServices) { }


  ngOnInit() {
  }

  emitRemove(contato: Contato){
    this.remove.emit(contato)
  }
  emitEditar(contato:Contato){
    this.editar.emit(contato)
  }

/*  editar(contato:Contato){
      this.router.navigate(['/editar'],
        {queryParams: contato});
  }*/
}

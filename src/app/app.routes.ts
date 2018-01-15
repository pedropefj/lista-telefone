import {Routes} from '@angular/router'
import {ContatosComponent} from './contatos/contatos.component'
import{CadastrarComponent} from './cadastrar/cadastrar.component'
import{HomeComponent} from './home/home.component'
export const ROUTES: Routes = [
  {path:'',component: HomeComponent},
  {path:'cadastrarContato',component: CadastrarComponent},
  {path:'listaContatos',component: ContatosComponent}
]

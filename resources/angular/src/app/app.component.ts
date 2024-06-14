import { Component } from '@angular/core';
import { QueryLookupComponent } from "./query-lookup/query-lookup.component";
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [CommonModule, QueryLookupComponent],
  templateUrl: './app.component.html',
})
export class AppComponent {}

import { Component } from '@angular/core'
import {CommonModule} from '@angular/common';
import { LookupService } from '../Service/lookup.service'
import { LookupResponse } from '../lookup_response.interface'

@Component({
  standalone: true,
  imports: [CommonModule],
  selector: 'app-query-lookup',
  templateUrl: 'query-lookup.component.html',
  styleUrls: ['query-lookup.component.scss'],
})
export class QueryLookupComponent {
  response: LookupResponse = { city: "", region: "", ip: "", rangeStart: "", rangeEnd: ""};
  query: string = ""

  constructor(private lookupService: LookupService) {}

  queryLookup(text: string): void {
    this.lookupService.query(text).subscribe((response: any) => {
      this.response = response;
    });
  }
}

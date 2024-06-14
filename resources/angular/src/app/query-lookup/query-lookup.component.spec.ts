import { ComponentFixture, TestBed } from '@angular/core/testing';
import { QueryLookupComponent } from './query-lookup.component';

describe('QueryLookupComponent', () => {
  let component: QueryLookupComponent;
  let fixture: ComponentFixture<QueryLookupComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [QueryLookupComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(QueryLookupComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

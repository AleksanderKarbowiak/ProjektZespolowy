using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using SCW.Entities;

namespace SCW
{
    //przykładowe dane do bazy 
    public class SCWSeeder
    {
        private readonly SCWDbContext _dbContext;
        public SCWSeeder(SCWDbContext dbContext)
        {
            _dbContext = dbContext;
        }
        public void Seed()
        {
            if (_dbContext.Database.CanConnect()) //spr czy polaczenie z baza jest nawiazane
            {
                if (!_dbContext.Faculties.Any()) //spr czy w tabeli Faculties jest jakikolwiek wiersz i jesli jest pusta to mozemy dodac dane
                {
                    var faculties = GetFaculties();
                    _dbContext.Faculties.AddRange(faculties);
                    _dbContext.SaveChanges();
                }
            }
        
        }

        private IEnumerable<Faculty> GetFaculties()
        {
            var faculties = new List<Faculty>()
            {
                new Faculty()
                {
                    Name="Wydział Zastosowań Informatyki i Matematki",
                    Description="Wydział na którym możesz zgłębić tajniki informatyki",
                    Fileds=new List<FieldOfStudy>()
                    {
                        new FieldOfStudy()
                        {
                            Name="Informatyka",
                            Description="Zostaniesz inzynierm informatyki ",
                            Subjects=new List<Subject>()
                            {
                                new Subject()
                                {
                                    Name="Matematyka Dyskretna",
                                    Description="Opanujesz logike matematyczna, operacje na zbiorach, indukcje i wiele innych",
                                    Lectuers=new List<Lectuer>()
                                    {
                                        new Lectuer()
                                        {
                                            Name="Andrzej",
                                            Surname="Zembrzuski",
                                            Degree="Dr",
                                            Email="andrzej_zembrzuski[at]sggw.edu.pl"
                                        }
                                    },
                                    Materials=new List<Material>()
                                    {
                                        new Material()
                                        {
                                            Link="Tu link do dysku",
                                            Name="Matma Dyskretna",
                                            Description="MAteriały do matmy dyskretnej"
                                        }
                                    }

                                },
                                new Subject()
                                {
                                    Name="Wstęp do programowania",
                                    Description="Opanujesz podstawy programowania oraz podstawy języka C#",
                                    Lectuers=new List<Lectuer>()
                                    {
                                        new Lectuer()
                                        {
                                            Name="Maciej",
                                            Surname="Pankiewicz",
                                            Degree="Dr inż",
                                            Email="maciej_pankiewicz [at] sggw.pl",
                                        }
                                    },
                                     Materials=new List<Material>()
                                    {
                                        new Material()
                                        {
                                            Link="Tu link do dysku",
                                            Name="Pod Programowania",
                                            Description="MAteriały Programowania",
                                        }
                                    }
                                }
                            }
                        },

                        new FieldOfStudy()
                        {
                            Name="Informatyka i Ekonometria",
                            Description="Duzo matmy, mniej informatyki",
                            Subjects=new List<Subject>()
                            {
                                new Subject()
                                { 
                                    Name="Rachunek Prawdopodobieństwa",
                                    Description="Nooo powdzenia",
                                    Lectuers=new List<Lectuer>()
                                    { 
                                        new Lectuer()
                                        { 
                                            Name="Wojciech",
                                            Surname="Zieliński",
                                            Degree="prof",
                                            Email="wojciech_zielinski [at] sggw.pl",
                                        }
                                    },
                                    Materials=new List<Material>()
                                    {
                                        new Material()
                                        {
                                            Link="Tu link do dysku",
                                            Name="Rachunek",
                                            Description="MAteriały do rachunku",
                                        }
                                    }
                                }

                            }
                             
                        }
                    }


                }
                
            };

            return faculties;
        }
    }
}

using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace SCW.Entities
{
    public class User
    {
        public int Id { get; set; }
        public string Name { get; set; }
        public string Surname { get; set; }
        public string Login { get; set; }
        public string Password { get; set; } //zaszyfrowane i hashe 
        public string Email { get; set; }

        public int FacultyId { get; set; }
        public int FieldId { get; set; }
        // wydział, kierunek,
        public bool IsTutor { get; set; }  

        public int TutorId { get; set; }
        //powiazanie 
    }
}

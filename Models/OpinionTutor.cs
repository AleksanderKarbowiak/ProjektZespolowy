using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace CentrumWiedzy.Models
{ 
    public class OpinionTutor
    {
        public int Id { get; set; }

        public int TutorId { get; set; }
        public virtual Tutor Tutor { get; set; }
        public string Description { get; set; }

        public int Grade { get; set; }
    }
}

# Generated by Django 2.1 on 2018-08-22 10:50

from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    dependencies = [
        ('business', '0063_chat'),
    ]

    operations = [
        migrations.AlterField(
            model_name='chat',
            name='business',
            field=models.ForeignKey(null=True, on_delete=django.db.models.deletion.CASCADE, related_name='business_select', to='business.Business'),
        ),
    ]

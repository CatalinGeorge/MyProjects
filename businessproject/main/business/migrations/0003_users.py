# Generated by Django 2.0.7 on 2018-07-27 07:21

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('business', '0002_products_image'),
    ]

    operations = [
        migrations.CreateModel(
            name='Users',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('email', models.CharField(max_length=140)),
                ('username', models.TextField()),
                ('password', models.TextField()),
            ],
        ),
    ]
